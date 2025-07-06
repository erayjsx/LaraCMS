@extends('layouts.app')

@section('title', 'Anasayfa')

@section('content')
    <h2>Hoş geldin!</h2>
    <p>Bu, Laravel ile oluşturduğun CMS'in ana sayfasıdır.</p>

    <a href="/system" class="btn btn-primary">Primary button</a>
    <button type="button" class="btn btn-primary" disabled>Disabled</button>
    <button type="button" class="btn btn-primary active">Selected</button>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open Modal
    </button>

    <div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog rounded-2xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-black" id="exampleModalLabel">İletişim Formu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body space-y-4">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="floatingName" placeholder="Name" />
                        <label for="floatingName">Adınız</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Email" />
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="message" class="form-control" id="floatingMessage" placeholder="Message"></textarea>
                        <label for="floatingMessage">Mesajınız</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-subtle" data-bs-dismiss="modal">İptal</button>
                    <button type="button" class="btn btn-primary px-4 py-2">Gönder</button>
                </div>
            </div>
        </div>
    </div>


    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        Button with data-bs-target
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            Some text as placeholder. In real life you can have the elements
            you have chosen. Like, text, images, lists, etc.
        </div>
    </div>
@endsection