@extends('layouts.dashboard')

@section("content")

    <main class="p-5">
        <div class="flex justify-between items-center">
            <h3 class="text-2xl font-black">İçerik Yönetimi</h3>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
                <i class="ph-bold ph-plus"></i>
                Yeni İçerik
            </button>
            <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
                style="width: 100%; max-width: 880px;">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasRightLabel">Yeni İçerik</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form>
                        <div class="grid grid-cols-2 gap-4 max-lg:grid-cols-1">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Başlık</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Kategori seçiniz</option>
                                    <option value="1">Kategori 1</option>
                                    <option value="2">Kategori 2</option>
                                    <option value="3">Kategori 3</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="exampleInputEmail1" class="form-label">İçerik</label>
                            <textarea name="content" id="editor" rows="10"></textarea>
                        </div>

                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-subtle me-2">İptal</button>
                            <button type="submit" class="btn btn-primary scale-105">Ekle</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>İçerik</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Başlık</td>
                        <td>Kategori</td>
                        <td>İçerik</td>
                        <td>
                            <button class="btn btn-primary">Düzenle</button>
                            <button class="btn btn-danger">Sil</button>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </main>

@endsection