<?= $this->extend('iot/templates') ?>

<?= $this->section('content') ?>
<div class="list-group my-5">
    <?php foreach ($data as $i): ?>
        <a href="" class="list-group-item list-group-item-action harga" data-menu="<?= $i['menu'] ?>" data-harga="<?= $i['harga'] ?>" aria-current="true">
            <?= $i['menu']; ?> | <?= angka($i['harga']); ?>
        </a>

    <?php endforeach; ?>

</div>

<h6>DAFTAR BELI</h6>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">MENU</th>
            <th scope="col">HARGA</th>
        </tr>
    </thead>
    <tbody class="body_transaksi">

    </tbody>

</table>

<div class="transaksi mt-4 d-grid"></div>

<script>
    let data = [];
    let total = 0;
    const body_transaksi = () => {
        let html = "";
        data.forEach((e, i) => {
            total += parseInt(e.harga);
            html += `<tr>
                    <td>${(i+1)}</td>
                    <td>${e.menu}</td>
                    <td class="text-end">${angka(e.harga)}</td>
                </tr>`;
        });

        html += `<tr>
                    <th colspan="2" class="text-center">TOTAL</th>
                    <th class="text-end">${angka(total)}</th>
                </tr>`;

        $(".body_transaksi").html(html);
        $(".transaksi").html(`<button class="btn btn-sm btn-primary bayar">BAYAR</button>`);
    }

    $(document).on('click', '.harga', function(e) {
        e.preventDefault();
        let menu = $(this).data('menu');
        let harga = $(this).data('harga');

        let temp_data = [];
        temp_data.push({
            menu,
            harga
        });

        data = temp_data;

        body_transaksi();
    });

    $(document).on('click', '.transaksi', function(e) {
        e.preventDefault();
        post("kantin/harga", {
            total
        }).then(res => {
            message(res.status, res.message);
        })
    });
    $(document).on('click', '.end', function(e) {
        location.reload();
    });

    const dot = () => {
        let dots = "";
        // interval untuk animasi titik
        let waiting_tap = setInterval(function() {
            dots = (dots.length < 6) ? dots + "." : "";
            $(".dots").text(dots);
        }, 1000);
    }

    // simpan ID interval
    let intervalCekBayar = setInterval(() => {
        post('kantin/cek_pembayaran').then(res => {
            if (res.data2 !== null) {

                if (res.data == 1) {
                    $(".transaksi").html(`<div class="text-danger">Silahkan tap <span class="dots"></span></div>`);
                    dot();
                } else {
                    let html = `
                    <div>Tgl: ${time_php_to_js(res.data2.tgl)}</div>`;
                    if (res.data == 2) {
                        html += `<div>Nama: ${res.data2.nama}</div>
                            <div>${res.data2.msg}</div>
                            <div>Saldo: ${angka(res.data2.uang)}</div>
    
                            <button class="btn btn-sm btn-danger end">SELESAI</button>
                        `
                    }
                    if (res.data == 3) {
                        html += `
                            <div>${res.data2.msg}</div>
                            <button class="btn btn-sm btn-danger end">SELESAI</button>
                        `
                    }

                    $(".transaksi").html(html);
                    // hentikan setInterval
                    clearInterval(intervalCekBayar);

                }


            }
        }).catch(err => {
            console.error("Error:", err);
        });
    }, 1000);
</script>
<?= $this->endSection() ?>