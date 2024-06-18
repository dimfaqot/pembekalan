<!DOCTYPE HTML>
<html>

<head>
    <title>SLOT GACOR</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('slot'); ?>/css/app.css">
</head>

<body>


    <div class="container">

        <div class="panel panel-primary">
            <a href="<?= base_url('slotgacor/login'); ?>">Login</a>
            <h3 class="panel-heading text-center bg-primary text-light p-2" style="border-radius: 5px;">SLOT GACOR</h3>
            <div class="panel-body">
                <div class="well text-center alert alert-primary" style="font-weight: bold;font-size: medium;">
                    Pilih angka tiga angka 1-7. Jika benar 1 sesuai urutan mendapatkan permen, jika 2 mendapatkan roti, jika 3 mendapatkan silverqueen.
                </div>

                <div class="d-flex justify-content-center">
                    <div class="slotwrapper" id="example2">
                        <ul>
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>

                        </ul>
                        <ul>
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>
                        </ul>
                        <ul>
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <div class="d-none">
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control " id="txt-example2-1" value="<?= explode(",", settings()['angka_bandar'])[0]; ?>" />
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control " id="txt-example2-2" value="<?= explode(",", settings()['angka_bandar'])[1]; ?>" />
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control " id="txt-example2-3" value="<?= explode(",", settings()['angka_bandar'])[2]; ?>" />
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-success btn-lg" id="btn-example2">Start Spin!</button>

                </div>

                <div class="collapse" id="collapse-example2">
                    <div class="well">
                        <code>
                            $('#btn-example2').click(function() {<br />
                            &nbsp;&nbsp;$('#example2 ul').playSpin({<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;endNum: [7, 7, 7],<br />
                            &nbsp;&nbsp;});<br />
                            });
                        </code>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="<?= base_url('slot'); ?>/js/slotmachine.js"></script>

    <script type="text/javascript">
        $('#btn-example1').click(function() {
            $('#example1 ul').playSpin();
        });

        $('#btn-example2').click(function() {
            let num1 = $('#txt-example2-1').val();
            let num2 = $('#txt-example2-2').val();
            let num3 = $('#txt-example2-3').val();
            $('#example2 ul').playSpin({
                endNum: [num1, num2, num3],
            });
        });

        $('#btn-example3-1').click(function() {
            $('#example3 ul').playSpin({
                stopSeq: 'leftToRight'
            });
        });

        $('#btn-example3-2').click(function() {
            $('#example3 ul').playSpin({
                stopSeq: 'rightToLeft'
            });
        });

        $('#btn-example4').click(function() {
            $('#example4 ul').playSpin({
                easing: 'easeOutBack'
            });
        });

        $('#btn-example5').click(function() {
            let time = $('#txt-example5').val();
            if (time < 0 || time == '') {
                time = 0;
            }
            $('#example5 ul').playSpin({
                time: time,
            });
        });

        $('#btn-example6').click(function() {
            $('#example6 ul').playSpin();
        });

        $('#btn-example7').click(function() {
            $('#lbl-example7-1').text('');
            $('#lbl-example7-2').text('');
            $('#example7 ul').playSpin({
                onEnd: function(num) {
                    $('#lbl-example7-1').text($('#lbl-example7-1').text() + num.toString());
                },
                onFinish: function(num) {
                    $('#lbl-example7-2').text(num);
                }
            });
        });

        let sound = new Audio('<?= base_url(); ?>slot/ringtones/spinning.mp3');
        let ding = new Audio('<?= base_url(); ?>slot/ringtones/ding.wav');
        // Loop of playing sound
        sound.addEventListener('ended', function() {
            this.currentTime = 0;
            this.play();
        }, false);

        $('#btn-example8').click(function() {
            sound.play(); // Start play the sound after click button
            $('#example8 ul').playSpin({
                time: 2000,
                endNum: [1, 2, 7],
                stopSeq: 'rightToLeft',
                onEnd: function() {
                    ding.play(); // Play ding after each number is stopped
                },
                onFinish: function() {
                    sound.pause(); // To stop the looping sound is pause it
                }
            });
        });

        $('#btn-example9-start').click(function() {
            $('#example9 ul').playSpin({
                manualStop: true
            });
        });

        $('#btn-example9-stop').click(function() {
            $('#example9 ul').stopSpin();
        });

        let numKeeptrack = 0;
        $('#btn-example10-start').click(function() {
            numKeeptrack = 3;
            $('#example10 #first').playSpin({
                manualStop: true
            });
            $('#example10 #second').playSpin({
                manualStop: true
            });
            $('#example10 #third').playSpin({
                manualStop: true
            });
        });

        $('#btn-example10-stop').click(function() {
            if (numKeeptrack == 3) {
                $('#example10 #third').stopSpin();
            } else if (numKeeptrack == 2) {
                $('#example10 #second').stopSpin();
            } else if (numKeeptrack == 1) {
                $('#example10 #first').stopSpin();
            }
            numKeeptrack--;
        });

        $('#btn-example11-start').click(function() {
            $('#example11 ul').playSpin({
                time: $('#txt-example11-time').val(),
                useStopTime: true,
                stopTime: $('#txt-example11-stoptime').val(),
            });
        });
    </script>
</body>

</html>