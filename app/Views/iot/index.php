<?= $this->extend('iot/templates') ?>

<?= $this->section('content') ?>

<div style="margin-top: 200px;">
    <div class="text-center top_body mb-5">
        <a href="" class="user text-dark" style="font-size: 60px;"><i class="fa-solid fa-user"></i></a>
        <div>USERS</div>
    </div>
    <div class="text-center">
        <h1 style="font-size:70px"><i class="fa-solid fa-wifi"></i></h1>
        <div>INTERNET OF THINGS</div>

    </div>
</div>

<script>
    $(document).on("click", ".user", function(e) {
        e.preventDefault();

        post('iot/user').then(res => {
            let html = `
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text">Cari</span>
                <input type="text" class="form-control cari_list" placeholder="...">
            </div>
            <ul class="list-group">`
            res.data.forEach(e => {
                html += `<li style="cursor:pointer" class="list-group-item select_list" data-id=${e.id} data-nama="${e.nama}">${e.nama}</li>`;
            });
            html += `</ul>`;

            $(".body_modal").html(html);
            modal.show();
        })
    })

    $(document).on('keyup', '.cari_list', function(e) {
        e.preventDefault();
        let value = $(this).val().toLowerCase();
        console.log(value);
        $('.list-group li').filter(function() {
            $(this).toggle($(this).data("nama").toLowerCase().indexOf(value) > -1);
        });

    });
    // Fungsi global untuk animasi titik
    function tap_interval(id) {
        let dots = "";
        // interval untuk animasi titik
        let waiting_tap = setInterval(function() {
            dots = (dots.length < 6) ? dots + "." : "";
            $(".dots").text(dots);
        }, 1000);

        // interval untuk cek API
        let tap = setInterval(function() {
            post('iot/rfid', {
                id
            }).then(res => {
                if (res.data !== "") {
                    clearInterval(waiting_tap); // hentikan animasi
                    clearInterval(tap); // hentikan polling
                    message(res.status, res.message);
                    if (res.status == "200") {
                        let html = `
                        <div class="text-success my-3" style="font-size:18px"><i class="fa-solid fa-circle-check"></i> SUKSES</div>
                        <div class="rounded p-2 border">UID: <b>${res.data}</b></div>
                        <a href="" class="btn btn-sm btn-danger mt-3"><i class="fa-solid fa-arrows-rotate"></i> RELOAD</a>
                        `;
                        $(".top_body").html(html);
                    } else {
                        let html = `<div class="rounded p-2 border">UID: <b class="text-danger">${res.message}</b></div>`;
                        $(".top_body").html(html);
                    }
                }
            }).catch(err => {
                console.error("Error:", err);
            });
        }, 1000);
    }


    $(document).on('click', '.select_list', function(e) {
        e.preventDefault();
        modal.hide();
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let html = `
        <div class="rounded p-2 border my-3">${nama}</div>
        <div class="text-danger">Silahkan tap <span class="dots"></span></div>`;

        $(".top_body").html(html);

        tap_interval(id, );
    });
</script>
<?= $this->endSection() ?>