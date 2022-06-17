
        <table class="table table-bordered"  align="left">
            <tr>
                <td class="subtitle" colspan="6">DATOS DE LA EMPRESA: UNIVERSIDAD SAN IGNACIO DE LOYOLA</td>
            </tr>
            <tr>
                <td class="left">Direción: </td>
                <td colspan="2" >Calle Luis Pasteur 1297 Lince - LIMA</td>
                <td class="left">RUC:</td>
                <td colspan="2">2030785423</td>
            </tr>
            <tr>
                <td class="subtitle" colspan="6">DATOS DEL CURSO:</td>
            </tr>
        </table>
        <table class="table table-bordered"  align="left">
            <thead>
                <tr>
                    <td colspan="2" class="left">CURSO: </td>
                    <td colspan="2">ALUMNO:</td>
                    <td colspan="2" class="left">MAESTRO: </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td colspan="2" class="left">{{ $data->curso }} </td>
                        <td colspan="2">{{ $data->alumno }}</td>
                        <td colspan="2" class="left">{{ $data->maestro }} </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>