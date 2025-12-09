@include('backend.common.header')
@include('backend.common.sidebar')
<!-- 

//TO-DO 
//Id e name unovoci dove serve, campi di input number con step 0,000 :)
//DCF -> OAF -_-
-->

<style>
    /* Stile aggiuntivo per rendere la tabella più aggressiva */
    table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    th,
    td {
        padding: 5px;
        text-align: center;
    }

    thead {
        background-color: blue;
        /* Colore di sfondo header */
        color: #ffffff;
        /* Colore testo header */
    }

    tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
        /* Colore di sfondo righe dispari */
    }

    tbody tr:nth-child(even) {
        background-color: #e9ecef;
        /* Colore di sfondo righe pari */
    }

    .btn-primary {
        background-color: #dc3545;
        /* Colore di sfondo pulsante Salva */
        border-color: #dc3545;
        /* Colore bordo pulsante Salva */
    }

    .btn-primary:hover {
        background-color: #c82333;
        /* Colore di sfondo pulsante Salva al passaggio del mouse */
        border-color: #bd2130;
        /* Colore bordo pulsante Salva al passaggio del mouse */
    }
</style>

<div class="content-wrapper">
    <section class="content-header" style="text-align: center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="color:blue">Modulo Qualità Materie Prime</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container">

        <form method="POST" action="{{ route('sendQualita_materia') }}">
            <div class="container mt-5" style="margin-top: 0!important">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" id="errore">Lotto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input onkeyup="find_info_em()" type="number" step="1" min="1" maxlength="80"
                                    class="form-control" name="uniqueInput" id="uniqueInput">
                                <p id="inserisci">Inserisci Lotto</p> </input>
                            </td>
                        </tr>

                </table>

                <div class="container mt-5" style="margin-top: 0!important">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" id="errore">Descrizione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" step="1" min="1" maxlength="80" class="form-control"
                                        name="campo27" id="campo27">
                                </td>
                            </tr>

                    </table>


                    <div class="container mt-5" style="margin-top: 0!important">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fornitore</th>
                                    <th scope="col">Data arrivo merce</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="campo26" id="campo26" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" name="campo18" id="campo18" readonly>
                                    </td>
                                </tr>

                        </table>

                        <div class="container mt-5" style="margin-top: 0!important">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Numero nostro Ordine</th>
                                        <th scope="col">Grado MFI</th>
                                        <th scope="col">N° Bolla di carico merce</th>
                                        <th scope="col">Documento DDT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" maxlength="80" class="form-control" name="campo21"
                                                id="campo21" readonly></td>
                                        <td><input type="number" step="0.01" maxlength="80"
                                                class="form-control" name="campo22" id="campo22"></td>
                                        <td><input type="number" step="1" maxlength="80"
                                                class="form-control" name="campo23" id="campo23" readonly>
                                        </td>
                                        <td><input type="text" maxlength="80"
                                                class="form-control" name="campo24" id="campo24">
                                        </td>
                                    </tr>
                            </table>

                            <div class="col-sm-12">
                                <h4 style="color:black">Analisi Termica</h4>
                            </div>

                            <div class="container mt-5" style="margin-top: 0!important">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Campione N</th>
                                            <th scope="col">Peso[gr]</th>
                                            <th scope="col">Tempo[s]</th>
                                            <th scope="col">MFI [gr/10']</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="number" step="0.0001" step="0.0001" maxlength="80" onchange="CalcolaMFI(), mediaTermica()"
                                                    class="form-control" name="campo1" id="campo1"></td>
                                            <td><input type="number" step="0.0001" step="0.0001" maxlength="80" onchange="CalcolaMFI(), mediaTermica()"
                                                    class="form-control" name="campo2" id="campo2">
                                            </td>
                                            <td><input type="number" step="0.0001" step="0.0001" maxlength="80"
                                                    onchange="mediaTermica()" class="form-control" name="campo3"
                                                    id="campo3" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control" onchange="CalcolaMFI(), mediaTermica()"
                                                    name="campo4" id="campo4"></td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control" onchange="CalcolaMFI(), mediaTermica()"
                                                    name="campo5" id="campo5">
                                            </td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control"
                                                    onchange="mediaTermica()" name="campo6" id="campo6" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control" onchange="CalcolaMFI(), mediaTermica()"
                                                    name="campo7" id="campo7"></td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control" onchange="CalcolaMFI(), mediaTermica()"
                                                    name="campo8" id="campo8">
                                            </td>
                                            <td><input type="number" step="0.0001" maxlength="80" class="form-control"
                                                    onchange="mediaTermica()" name="campo9" id="campo9" readonly>
                                            </td>

                                        </tr>
                                </table>
                                <div class="col-sm-12">
                                    <h4 style="color:black">Analisi Termica</h4>
                                </div>

                                <div class="container mt-5" style="margin-top: 0!important">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">T di Prova[°C]</th>
                                                <th scope="col">Carico [gr]</th>
                                                <th scope="col">Prove N°</th>
                                                <th scope="col">Media</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="number" step="0.0001" maxlength="80"
                                                        class="form-control" name="campo13" id="campo13">
                                                </td>
                                                <td><input type="number" step="0.0001" maxlength="80"
                                                        class="form-control" name="campo14" id="campo14" value="3">
                                                </td>
                                                <td><input type="number" step="0.0001" maxlength="80"
                                                        class="form-control" name="campo15" id="campo15" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Esito</td>
                                                <td><input type="number" step="0.0001" maxlength="80"
                                                        class="form-control" name="campo16" id="campo16">
                                                </td>
                                                <td>Data controllo</td>
                                                <td><input type="date" step="0.0001" maxlength="80" class="form-control"
                                                        name="campo17" id="campo17"></td>
                                            </tr>
                                    </table>

                                    <div class="col-sm-12">
                                        <h4 style="color:black">Analisi Scivolosità</h4>
                                    </div>

                                    <div class="container mt-5" style="margin-top: 0!important">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> </th>
                                                    <th scope="col">Campione N°</th>
                                                    <th scope="col">COF</th>
                                                    <th scope="col"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input type="number" step="0.0001" maxlength="80"
                                                            onchange="mediaScivolosita()" class="form-control"
                                                            name="campo10" id="campo10"></td>

                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input type="number" step="0.0001" maxlength="80"
                                                            onchange="mediaScivolosita()" class="form-control"
                                                            name="campo11" id="campo11"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input type="number" step="0.0001" maxlength="80"
                                                            onchange="mediaScivolosita()" class="form-control"
                                                            name="campo12" id="campo12"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Media</td>
                                                    <td><input type="number" step="0.0001" maxlength="80"
                                                            class="form-control" name="campo25" id="campo25" readonly>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Esito</td>
                                                    <td><input type="text" step="0.0001" maxlength="80"
                                                            class="form-control" name="campo19" id="campo19"></td>
                                                    <td>Data controllo</td>
                                                    <td><input type="date" step="0.0001" maxlength="80"
                                                            class="form-control" name="campo20" id="campo20"></td>
                                                </tr>
                                        </table>

                                        <div class="col-sm-12">
                                            <h4 style="color:black">Note</h4>
                                        </div>
                                        <div class="container mt-5" style="margin-top: 0!important">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <textarea class="form-control" name="Note" id="Note" rows="4" placeholder="Inserisci note..."></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <input name="cd_operatore" type="hidden" value="{{ $utente->Cd_Operatore }}"
                                            class="form-control">
                                        <button type="submit" value="salva" name="salva" class="btn btn-primary btn-lg"
                                            style="width: 100%;margin: 2%">
                                            Salva
                                        </button>
                                        <div class="clearfix"></div>
                                    </div>
        </form>

    </section>
</div>
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
@include('backend.common.footer')
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

    document.addEventListener("keypress", function (event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.activeElement.blur();
        }
    });

    function find_info_em() {
        let dcf = $('#uniqueInput').val();
        if (!dcf.trim()) {
            document.getElementById('errore').innerHTML = 'Lotto';
            document.getElementById('inserisci').innerHTML = 'Inserisci lotto';
            
            // Pulisci tutti i campi quando il lotto viene rimosso
            for (let i = 1; i <= 27; i++) {
                var campo = 'campo' + i;
                document.getElementById(campo).value = '';
            }
            document.getElementById('Note').value = '';
            
            return;
        }
        $.ajax({
            url: "/ajax/qualitamateria/" + dcf,
        }).done(function (result) {
            document.getElementById('errore').innerHTML = 'Lotto';
            document.getElementById('inserisci').innerHTML = 'Lotto valido!';

            if (result != '') {
                eval(result);
            }

            mediaScivolosita();
            mediaTermica();
            CalcolaMFI();


        }).fail(function (result) {
            document.getElementById('errore').innerHTML = 'Lotto [NON TROVATO]';
            document.getElementById('inserisci').innerHTML = '';

            for (let i = 1; i <= 28; i++) {
                var campo = 'campo' + i;
                eval("document.getElementById('" + campo + "').value = '';");
            }
            
            document.getElementById('Note').value = '';

        });
    }

    function mediaTermica() {
        let campo3 = parseFloat(document.getElementById('campo3').value);
        let campo6 = parseFloat(document.getElementById('campo6').value);
        let campo9 = parseFloat(document.getElementById('campo9').value);

        let divisore = 0;
        if (campo3 !== 0 && !isNaN(campo3)) {
            divisore++;
        } else {
            campo3 = 0;
        }
        if (campo6 !== 0 && !isNaN(campo6)) {
            divisore++;
        } else {
            campo6 = 0;
        }
        if (campo9 !== 0 && !isNaN(campo9)) {
            divisore++;
        } else {
            campo9 = 0;
        }

        let r = (campo3 + campo6 + campo9) / divisore;
        document.getElementById("campo15").value = r.toFixed(3);
    }

    function mediaScivolosita() {
        let campo10 = parseFloat(document.getElementById('campo10').value);
        let campo11 = parseFloat(document.getElementById('campo11').value);
        let campo12 = parseFloat(document.getElementById('campo12').value);

        let divisore = 0;
        if (campo10 !== 0 && !isNaN(campo10)) {
            divisore++;
        } else {
            campo10 = 0;
        }
        if (campo11 !== 0 && !isNaN(campo11)) {
            divisore++;
        } else {
            campo11 = 0;
        }
        if (campo12 !== 0 && !isNaN(campo12)) {
            divisore++;
        } else {
            campo12 = 0;
        }

        let r = (campo10 + campo11 + campo12) / divisore;
        document.getElementById("campo25").value = r.toFixed(3);
    }

    function CalcolaMFI() {
        let campo1 = parseFloat(document.getElementById('campo1').value);
        let campo2 = parseFloat(document.getElementById('campo2').value);
        let campo4 = parseFloat(document.getElementById('campo4').value);
        let campo5 = parseFloat(document.getElementById('campo5').value);
        let campo7 = parseFloat(document.getElementById('campo7').value);
        let campo8 = parseFloat(document.getElementById('campo8').value);

        let mfi1 = ((campo1 * 600) / campo2);
        let mfi2 = ((campo4 * 600) / campo5);
        let mfi3 = ((campo7 * 600) / campo8);
        
        document.getElementById("campo3").value = mfi1.toFixed(3);
        document.getElementById("campo6").value = mfi2.toFixed(3);
        document.getElementById("campo9").value = mfi3.toFixed(3);
    }

</script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>

</html>