<table>
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Penyakit</th>
            <th>Gejala</th>
            <th>Persentase</th>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->name }}</td>
                <td>{{ $dt->penyakit }}</td>
                <td>
                    @php
                        $gejala = json_decode($dt->gejala_id);
                    @endphp
                    @foreach ($gejala as $row)
                        {{ namaKdGejala($row) }} ,
                    @endforeach

                </td>
                <td>{{ $dt->persentase }} %</td>
            </tr>
        @endforeach
    </tbody>
</table>
