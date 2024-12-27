@include('backend.common.header')
@include('backend.common.sidebar')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="input-icons">
                            <button onclick="cerca()" style="width:10%;height: 80%;border: none"><i
                                    class="fa fa-check"></i></button>
                            <input type="text" autocomplete="off" style="width:100%;border: none" id="modal_id_prol"
                                   class="form-control input-field" placeholder="Cerca Ordine di Lavoro...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" id="numero_ol">Tracciabilita</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="ajax_tracciabilita">
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.common.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script type="text/javascript">
    //alert('Questa Bolla è stata chiusa in precedenza');

    $(document).ready(function () {
        if (sessionStorage.getItem('password') != 'Laboratorio2024') {
            $('#modal_password').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });

    // top.location.href = '/';
</script>
<div class="modal fade" id="modal_password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inserire Password</h4>
            </div>
            <div class="modal-body">
                <input type="password" id="password" class="form-control">
                <div class="clearfix"></div>
            </div>

            <div class="modal-footer">
                <button class="form-control btn btn-primary" onclick="check_Password()">Conferma</button>
                <button class="form-control btn btn-danger" onclick="top.location.href='/';">Annulla</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Page specific script -->
<script type="text/javascript">
    function check_Password() {
        psw = document.getElementById('password').value;
        if (psw === 'Laboratorio2024') {
            sessionStorage.setItem('password', 'Laboratorio2024');
            $('#modal_password').modal('hide');
        } else {
            alert('password errata!');
            top.location.href = '/';
        }

    }
    $('#modal_id_prol').val(localStorage.getItem("modal_id_prol"));

    function cerca() {
        id_prol = document.getElementById('modal_id_prol').value;
        localStorage.setItem("modal_id_prol", id_prol);

        $.ajax({
            url: "<?php echo URL::asset('ajax/load_tracciabilita') ?>/" + id_prol
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cerca1(ProlAttivita) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_tracciabilita1') ?>/" + id_prol + "/" + ProlAttivita
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cercaimballo(ProlAttivita) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_imballo') ?>/" + id_prol + "/" + ProlAttivita
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cercaimballo2(ProlAttivita, Nr_Pedana) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_imballo2') ?>/" + id_prol + "/" + ProlAttivita + "/" + Nr_Pedana
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cerca2(ProlAttivita, Nr_Collo) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_tracciabilita2') ?>/" + id_prol + "/" + ProlAttivita + "/" + Nr_Collo
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cerca_dietro(ProlAttivita, Rif_Nr_Collo, Rif_Nr_Collo2) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_tracciabilita_dietro') ?>/" + id_prol + "/" + ProlAttivita + "/" + Rif_Nr_Collo + "/" + Rif_Nr_Collo2
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }

    function cerca_collo(Nr_Collo, ProlAttivita) {
        id_prol = document.getElementById('modal_id_prol').value;
        $.ajax({
            url: "<?php echo URL::asset('ajax/load_cerca_collo') ?>/" + id_prol + "/" + ProlAttivita + "/" + Nr_Collo
        }).done(function (result) {
            $('#ajax_tracciabilita').html(result);
        });
    }
</script>
</body>
</html>
