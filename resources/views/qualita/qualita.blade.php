@include('backend.common.header')
@include('backend.common.sidebar')

<style>
    /* Stile aggiuntivo per rendere la tabella più aggressiva */
    table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    th, td {
        padding: 5px;
        text-align: center;
    }

    thead {
        background-color: blue; /* Colore di sfondo header */
        color: #ffffff; /* Colore testo header */
    }

    tbody tr:nth-child(odd) {
        background-color: #f8f9fa; /* Colore di sfondo righe dispari */
    }

    tbody tr:nth-child(even) {
        background-color: #e9ecef; /* Colore di sfondo righe pari */
    }

    .btn-primary {
        background-color: #dc3545; /* Colore di sfondo pulsante Salva */
        border-color: #dc3545; /* Colore bordo pulsante Salva */
    }

    .btn-primary:hover {
        background-color: #c82333; /* Colore di sfondo pulsante Salva al passaggio del mouse */
        border-color: #bd2130; /* Colore bordo pulsante Salva al passaggio del mouse */
    }
</style>

<div class="content-wrapper">
    <section class="content-header" style="text-align: center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="color:blue">Modulo Qualità</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="container">


        <div class="container mt-5">
            <form method="POST" action="{{ route('sendQualita') }}">
                <div class="form-group" style="display: flex;width: 100%;justify-content: space-evenly;">
                    <div class="form-group" style="width:48%">
                        <label for="uniqueInput">(SOLO PER MODIFICARE)Identificativo Univoco:</label>
                        <input onchange="find_info_id()" type="text" list="id_xformqualita" class="form-control"
                               id="uniqueInput_id"
                               name="uniqueInput_id" value="" placeholder="Inserire Identificativo Univoco..."
                               autocomplete="off" style="width:100%">
                        <input type="hidden" id="campo106" name="campo106">
                        <datalist id="id_xformqualita">
                            @foreach ($id_xformqualita as $o)
                                <option
                                    value="{{$o->Id_xFormQualita}}">{{$o->Id_xFormQualita. ' - ' . $o->campo106}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group" style="width:48%">
                        <label for="uniqueInput">Ordine di Lavorazione:</label>
                        <input onchange="find_info()" type="text" list="ol" class="form-control" id="uniqueInput"
                               name="uniqueInput" value="" placeholder="Inserire Ordine Lavorazione..."
                               autocomplete="off" style="width:100%">
                        <datalist id="ol">
                            @foreach ($ol as $o)
                                <option value="{{$o->Id_PrOL}}">{{$o->Cd_AR . ' - ' . $o->Id_PrOL}}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <input type="text" id="referenza"
                       style="width: 100%;border: none;background:#f4f6f9;text-align: center;font-weight: bolder">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Strumento Utilizzato</th>
                        <th scope="col">Valore Misurato</th>
                        <th scope="col">Valore Richiesto</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> Spessore</td>
                        <td><input type="text" maxlength="80" class="form-control" value="Micrometro Mitutoyo" readonly
                                   name="campo1"
                                   id="campo1"></td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo2" id="campo2"></td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo22" id="campo22"></td>
                    </tr>
                    <tr>
                        <td> Larghezza</td>
                        <td><input type="text" maxlength="80" class="form-control" value="Metro" readonly name="campo3"
                                   id="campo3">
                        </td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo4" id="campo4"></td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo23" id="campo23"></td>
                    </tr>
                    <tr>
                        <td> Peso Metro</td>
                        <td>
                            <select name="campo5" id="campo5" class="form-control">
                                <option selected value="Bilancia Laumas">Bilancia Laumas</option>
                                <option value="Bilancia RadWag">Bilancia RadWag</option>
                            </select>
                        </td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo6" id="campo6"></td>
                        <td><input type="text" maxlength="80" class="form-control" name="campo24" id="campo24"></td>

                    </tr>
                    <tr>
                        <td> Altezza</td>
                        <td><input type="text" maxlength="80" class="form-control" value="Metro" readonly name="campo7"
                                   id="campo7">
                        </td>
                        <td><input type="text" maxlength="80" class="form-control" value="" name="campo40" id="campo40">
                        </td>
                        <td><input type="text" maxlength="80" class="form-control" value="" name="campo25" id="campo25">
                        </td>

                    </tr>
                    <tr>
                        <td> Peso Busta</td>
                        <td><select name="campo8" id="campo8" class="form-control">
                                <option selected value="Bilancia RadWag">Bilancia RadWag</option>
                                <option value="Bilancia Laumas">Bilancia Laumas</option>
                            </select></td>
                        <td><input name="campo9" id="campo9" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="" name="campo26" id="campo26">
                        </td>
                    </tr>
                    <tr>
                        <td> Tenuta Saldatura</td>
                        <td><input name="campo10" id="campo10" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><input name="campo11" id="campo11" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="Fondo-Laterale-Soffietti"
                                   readonly
                                   name="campo27" id="campo27"></td>
                    </tr>
                    <tr>
                        <td> Coefficiente di Attrito</td>
                        <td><input name="campo12" id="campo12" value="Dinamometro" readonly type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><input name="campo13" id="campo13" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><select class="form-control" name="campo28"
                                    id="campo28">
                                <option selected value="non richiesto">non richiesto</option>
                                <option value="slip">slip</option>
                                <option value="no slip">no slip</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td> Saldabilità</td>
                        <td><input name="campo14" id="campo14" value="Saldatrice Brugger" readonly type="text"
                                   maxlength="80"
                                   class="form-control"></td>
                        <td><input name="campo15" id="campo15" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="SI" readonly name="campo29"
                                   id="campo29">
                        </td>
                    </tr>
                    <tr>
                        <td> Termoretrazione 50%</td>
                        <td><input name="campo16" id="campo16" type="text" maxlength="80" value="Thermal Shrinkage"
                                   readonly
                                   class="form-control"></td>
                        <td><input name="campo17" id="campo17" type="text" maxlength="80" class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="50% a 120°" readonly
                                   name="campo30"
                                   id="campo30"></td>
                    </tr>
                    <tr>
                        <td> Termoretrazione 15%</td>
                        <td><input name="campo37" id="campo37" type="text" maxlength="80" value="Tester PARAM" readonly
                                   class="form-control"></td>
                        <td><input name="campo38" id="campo38" type="text" maxlength="80" class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="15% a 120°" readonly
                                   name="campo39"
                                   id="campo39"></td>
                    </tr>
                    <tr>
                        <td> Trattamento corona 1 LATO</td>
                        <td><input name="campo18" id="campo18" type="text" maxlength="80" value="Pen Quick Chech"
                                   readonly
                                   class="form-control"></td>
                        <td><input name="campo36" id="campo36" type="text" maxlength="80" class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="1 Lato" readonly
                                   name="campo31" id="campo31">
                        </td>
                    </tr>
                    <tr>
                        <td> Trattamento corona 2 LATO</td>
                        <td><input name="campo33" id="campo33" type="text" maxlength="80" value="Pen Quick Chech"
                                   readonly
                                   class="form-control"></td>
                        <td><input name="campo34" id="campo34" type="text" maxlength="80" class="form-control"></td>
                        <td><input type="text" maxlength="80" class="form-control" value="2 Lato" readonly
                                   name="campo35" id="campo35">
                        </td>
                    </tr>
                    <tr>
                        <td> Controllo stampa</td>
                        <td><input name="campo19" id="campo19" value="Visivo" readonly type="text" maxlength="80"
                                   class="form-control">
                        </td>
                        <td><input name="campo20" id="campo20" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td>
                            <select class="form-control" id="campo32" name="campo32">
                                <option value="assente">assente</option>
                                <option value="presente">presente</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td> Note</td>
                        <td><input name="campo21" id="campo21" style="width: 200%" value="" type="text" maxlength="80"
                                   class="form-control"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> Materiali Monostrato</td>
                        <td>
                            <div style="display: flex;gap:3%">
                                <input name="campo41" id="campo41" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo42" id="campo42" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo43" id="campo43" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo44" id="campo44" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo45" id="campo45" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo46" id="campo46" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo47" id="campo47" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo48" id="campo48" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                        <td>
                            <input class="form-control" readonly value="Operatore ESTRUSIONE">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input class="form-control" readonly value="Data ESTRUSIONE">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                        <td>
                            <select class="form-control" id="campo73" name="campo73"></select>
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input type="date" class="form-control" id="campo74" name="campo74" value="">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                    </tr>
                    <tr>
                        <td> Materiali Lato A</td>
                        <td>
                            <div style="display: flex;gap:3%">
                                <input name="campo49" id="campo49" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo50" id="campo50" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo51" id="campo51" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo52" id="campo52" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo53" id="campo53" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo54" id="campo54" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo55" id="campo55" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo56" id="campo56" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                        </td>
                        <td>
                            <input class="form-control" readonly value="Operatore STAMPA">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input class="form-control" readonly value="Data STAMPA">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                        <td>
                            <select class="form-control" id="campo75" name="campo75"></select>
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input type="date" class="form-control" id="campo76" name="campo76" value="">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                    </tr>
                    <tr>
                        <td> Materiali Lato B</td>
                        <td>
                            <div style="display: flex;gap:3%">
                                <input name="campo57" id="campo57" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo58" id="campo58" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo59" id="campo59" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo60" id="campo60" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo61" id="campo61" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo62" id="campo62" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo63" id="campo63" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo64" id="campo64" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                        </td>
                        <td>
                            <input class="form-control" readonly value="Operatore SALDATURA">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input class="form-control" readonly value="Data SALDATURA">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                        <td>
                            <select class="form-control" id="campo77" name="campo77"></select>
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input type="date" class="form-control" id="campo78" name="campo78" value="">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                    </tr>
                    <tr>
                        <td> Materiali Lato C</td>
                        <td>
                            <div style="display: flex;gap:3%">
                                <input name="campo65" id="campo65" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo66" id="campo66" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo67" id="campo67" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo68" id="campo68" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo69" id="campo69" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo70" id="campo70" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                            <div style="display: flex;gap:3%">
                                <input name="campo71" id="campo71" value="" style="width: 75%"
                                       type="text" maxlength="80" class="form-control">
                                <input name="campo72" id="campo72" value="" style="width: 20%" type="text"
                                       maxlength="80"
                                       class="form-control">
                            </div>
                        </td>
                        <td>
                            <input class="form-control" readonly value="Operatore TAGLIO">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input class="form-control" readonly value="Data TAGLIO">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                        <td>
                            <select class="form-control" id="campo79" name="campo79"></select>
                            <input class="form-control" readonly value="" style="visibility: hidden">
                            <input type="date" class="form-control" id="campo80" name="campo80" value="">
                            <input class="form-control" readonly value="" style="visibility: hidden">
                        </td>
                    </tr>

                    </tbody>
                </table>
                <input name="cd_operatore" type="hidden" value="{{ $utente->Cd_Operatore }}" class="form-control">
                <button type="submit" value="salva" name="salva" class="btn btn-primary btn-lg"
                        style="width: 100%;margin: 2%">
                    Salva
                </button>
                <button type="submit" value="modifica" name="modifica" class="btn btn-secondary btn-lg"
                        style="width: 100%;margin: 2%">Modifica
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

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

    function find_info() {
        ol = $('#uniqueInput').val();
        pulisci_campi();
        $.ajax({
            url: "/ajax/qualita/find_info/" + ol,
        }).done(function (result) {pulisci_campi();
            if (result != '') {
                eval(result);
            }
        });
    }

    function find_info_id() {
        ol = $('#uniqueInput_id').val();
        pulisci_campi();
        $.ajax({
            url: "/ajax/qualita/find_info_id/" + ol,
        }).done(function (result) {pulisci_campi();
            if (result != '') {
                eval(result);
            }
        });
    }

    function pulisci_campi(){
        $('#campo73').html('');
        $('#campo75').html('');
        $('#campo77').html('');
        $('#campo79').html('');
    }

    function prepopolaInputDaURL() {
        function getParameterByName(name) {
            const url = new URLSearchParams(window.location.search);
            return url.get(name);
        }

        var olValue = getParameterByName('ol');
        if (olValue) {
            $('#uniqueInput').val(olValue);
            find_info();
        }
    }

    $(document).ready(function () {
        prepopolaInputDaURL();
    });
</script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>

</html>
