<?= $this->extend('iot/templates') ?>

<?= $this->section('content') ?>
<h1 class="text-center" style="margin-top: 50px;font-size:69px"><i class="fa-solid fa-lightbulb"></i></h1>
<div class="text-center light_text">LIGHT OFF</div>

<div class="d-flex justify-content-center mt-3">
    <div class="form-check form-switch">
        <input class="form-check-input btn_saklar" type="checkbox" role="switch">
    </div>
</div>

<div class="text-center mt-3">
    <h2 class="mb-3">Durasi countdown:</h2>
    <input type="number" id="countdownInput" class="form-control w-25 mx-auto mb-3" min="1" value="10">
    <button id="startButton" class="btn btn-primary">Mulai Countdown</button>

    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center rounded-circle border border-primary mt-3"
            style="width: 100px; height: 100px;">
            <span id="countdownDisplay" class="fs-2 fw-bold">10</span>
        </div>
    </div>
</div>



<script>
    const kondisi = () => {
        post("iot/kondisi", {
            kategori: "<?= $judul; ?>"
        }).then(res => {
            if (res.data !== null) {
                $(".light_text").text("LIGHT " + res.data.value.toUpperCase());
                if (res.data.value == "on") {
                    $(".light_text").addClass("text-warning");
                    $(".fa-lightbulb").addClass("text-warning");
                    $(".btn_saklar").prop("checked", true);
                } else {
                    $(".fa-lightbulb").removeClass("text-warning");
                    $(".light_text").removeClass("text-warning");
                    $(".btn_saklar").prop("checked", false);
                }
            }
        })
    }
    setInterval(() => {
        kondisi();
    }, 1000);

    $(document).on("change", ".btn_saklar", function(e) {
        e.preventDefault();
        let check = $(this).is(":checked");
        post('iot/saklar_lampu', {
            kategori: "<?= $judul; ?>",
            check
        }).then(res => {
            message(res.status, res.message);
        })
    })


    $(document).ready(function() {
        $("#startButton").click(function() {
            let count = parseInt($("#countdownInput").val());
            post('iot/durasi_lampu', {
                kategori: "<?= $judul; ?>",
                durasi: count
            }).then(res => {
                $("#countdownDisplay").text(count);

                let interval = setInterval(function() {
                    count--;
                    $("#countdownDisplay").text(count);

                    if (count <= 0) {
                        clearInterval(interval); // Hentikan countdown saat mencapai nol
                        post('iot/saklar_lampu', {
                            kategori: "<?= $judul; ?>"
                        }).then(res => {
                            message(res.status, res.message);
                            if (res.status == "200") {
                                $(".btn_saklar").prop("checked", true);
                            } else {
                                $(".btn_saklar").prop("checked", false);
                            }
                        })
                    }
                }, 1000);
            })

        });
    });
</script>
<?= $this->endSection() ?>