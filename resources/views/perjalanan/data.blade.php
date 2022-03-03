<div class="tab-pane fade mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table table-striped" id="dataTable">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Suhu Tubuh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_perjalanan as $item)
                <tr>
                    <td>{{ $item["tanggal"] }}</td>
                    <td>{{ $item["jam"] }}</td>
                    <td>{{ $item["lokasi"] }}</td>
                    <td>{{ $item["suhu"] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
