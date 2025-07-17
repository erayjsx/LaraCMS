@extends('layouts.app')

@section('content')
    <config-provider>
        <div class="container mx-auto flex row px-4 gap-6 h-[calc(100vh-14rem)]">
            <div class="lg:w-2/5 w-full flex flex-col justify-center items-center h-full">
                <n-tabs class="card-tabs" default-value="signin" size="large" animated pane-wrapper-style="margin: 0 -4px"
                    pane-style="padding-left: 4px; padding-right: 4px; box-sizing: border-box;">
                    <n-tab-pane name="signin" tab="Giriş Yap">
                        <n-form>
                            <n-form-item-row label="E-Posta">
                                <n-input size="large" />
                            </n-form-item-row>
                            <n-form-item-row label="Şifre">
                                <n-input size="large" />
                            </n-form-item-row>
                        </n-form>
                        <n-button type="primary" block secondary strong size="large">
                            Giriş Yap
                        </n-button>
                    </n-tab-pane>
                    <n-tab-pane name="signup" tab="Kayıt Ol">
                        <n-form>
                            <n-form-item-row label="E-Posta">
                                <n-input size="large" />
                            </n-form-item-row>
                            <n-form-item-row label="Şifre">
                                <n-input size="large" />
                            </n-form-item-row>
                            <n-form-item-row label="Şifre (Tekrar)">
                                <n-input size="large" />
                            </n-form-item-row>
                        </n-form>
                        <n-button type="primary" block secondary strong size="large">
                            Kayıt Ol
                        </n-button>
                    </n-tab-pane>
                </n-tabs>
            </div>

            <div
                class="w-3/5 max-lg:hidden flex-1 bg-no-repeat bg-center bg-contain bg-[url('https://cdn.myikas.com/images/theme-images/710aef3e-806f-4e82-9afd-b49d295ca2f4/image_1080.webp')]">

            </div>
        </div>
    </config-provider>
@endsection
