<div class="tab-pane fade mt-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <form action="{{ route("perjalanan.store") }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal">
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="time" name="jam" class="form-control" id="jam">
        </div>
        <div class="mb-3">
            <label for="suhu" class="form-label">Suhu Tubuh</label>
            <input type="text" name="suhu" class="form-control" id="suhu">
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">lokasi</label>
            <textarea class="form-control" name="lokasi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
