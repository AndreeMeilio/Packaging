<div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card">
        <div class="card-header">
            Home
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Selamat datang {{ Session::get('nama_lengkap') }} di aplikasi peduli diri</p>
        </div>
        <div class="card-footer">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Isi Data</button>
        </div>
    </div>
</div>
