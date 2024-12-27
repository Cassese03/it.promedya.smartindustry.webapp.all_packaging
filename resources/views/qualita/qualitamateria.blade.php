@include('backend.common.header')
@include('backend.common.sidebar')

<style>
    body {
        overflow: hidden;
    }

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

<img style="height: 100%;width: 100%;z-index: 9999;" alt="immagine" src="img/logo_smart_industry.png">
<div class="content-wrapper">
    <section class="content-header" style="text-align: center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="color:blue">Modulo Qualità Materia Prima</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="container">


        <div class="container mt-5">
            <form method="POST" action="{{ route('sendQualita') }}">
                <div class="form-group">
                    <label for="uniqueInput">Campo Univoco:</label>
                    <input onchange="find_info()" type="text" list="ol" class="form-control" id="uniqueInput"
                           name="uniqueInput" value="" placeholder="Inserire ID Documento..."
                           autocomplete="off" required>
                    <datalist id="ol">
                        @foreach ($ol as $o)
                            <option value="{{$o->Id_PrOL}}">{{$o->Cd_AR . ' - ' . $o->Id_PrOL}}</option>
                        @endforeach
                    </datalist>
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
                        <td><input type="text" class="form-control" name="campo1" id="campo1"></td>
                        <td><input type="text" class="form-control" name="campo2" id="campo2"></td>
                        <td><input type="text" class="form-control" name="campo22" id="campo22"></td>
                    </tr>
                    <tr>
                        <td> Larghezza</td>
                        <td><input type="text" class="form-control" name="campo3" id="campo3"></td>
                        <td><input type="text" class="form-control" name="campo4" id="campo4"></td>
                        <td><input type="text" class="form-control" name="campo23" id="campo23"></td>
                    </tr>
                    <tr>
                        <td> Peso Metro</td>
                        <td><input type="text" class="form-control" name="campo5" id="campo5"></td>
                        <td><input type="text" class="form-control" name="campo6" id="campo6"></td>
                        <td><input type="text" class="form-control" name="campo24" id="campo24"></td>

                    </tr>
                    <tr>
                        <td> Altezza</td>
                        <td><input type="text" class="form-control" value="" name="campo7" id="campo7"></td>
                        <td><input type="text" class="form-control" value="" name="campo7" id="campo7"></td>
                        <td><input type="text" class="form-control" value="" name="campo25" id="campo25"></td>

                    </tr>
                    <tr>
                        <td> Peso Busta</td>
                        <td><input name="campo8" id="campo8" value="" type="text"
                                   class="form-control"></td>
                        <td><input name="campo9" id="campo9" value="" type="text"
                                   class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo26" id="campo26"></td>
                    </tr>
                    <tr>
                        <td> Tenuta Saldatura</td>
                        <td><input name="campo10" id="campo10" value="" type="text"
                                   class="form-control"></td>
                        <td><input name="campo11" id="campo11" value="" type="text"
                                   class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo27" id="campo27"></td>
                    </tr>
                    <tr>
                        <td> Coefficiente di Attrito</td>
                        <td><input name="campo12" id="campo12" value="" type="text"
                                   class="form-control"></td>
                        <td><input name="campo13" id="campo13" value="" type="text"
                                   class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo28" id="campo28"></td>
                    </tr>
                    <tr>
                        <td> Saldabilità</td>
                        <td><input name="campo14" id="campo14" value="" type="text"
                                   class="form-control"></td>
                        <td><input name="campo15" id="campo15" value="" type="text"
                                   class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo29" id="campo29"></td>
                    </tr>
                    <tr>
                        <td> Termoretrazione</td>
                        <td><input name="campo16" id="campo16" type="text" class="form-control"></td>
                        <td><input name="campo17" id="campo17" type="text" class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo30" id="campo30"></td>
                    </tr>
                    <tr>
                        <td> Trattamento corona</td>
                        <td><input name="campo18" id="campo18" type="text" class="form-control"></td>
                        <td><input name="campo18" id="campo18" type="text" class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo31" id="campo31"></td>
                    </tr>
                    <tr>
                        <td> Controllo stampa</td>
                        <td><input name="campo19" id="campo19" value="" type="text" class="form-control"></td>
                        <td><input name="campo20" id="campo20" value="" type="text" class="form-control"></td>
                        <td><input type="text" class="form-control" value="" name="campo32" id="campo32"></td>

                    </tr>
                    <tr>
                        <td> Note</td>
                        <td><input name="campo21" id="campo21" style="width: 300%" value="" type="text"
                                   class="form-control"></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
                <input name="cd_operatore" type="hidden" value="{{ $utente->Cd_Operatore }}" class="form-control">
                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Salva</button>
                <div class="clearfix"></div>
            </form>
        </div>

    </section>
</div>

@include('backend.common.footer')
<script type="text/javascript">

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
        $.ajax({
            url: "/ajax/qualita/find_info/" + ol,
        }).done(function (result) {
            if (result != '') {
                eval(result);
            }
        });
    }
</script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>

</html>
