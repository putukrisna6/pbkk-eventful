@extends('owner.layouts.app')

@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Buildings</li>
                    <li>Edit</li>
                </ul>
        </div>
    </section>

    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Form Edit Buildings
            </h1>
        </div>
    </section>

    <section class="section main-section">
        <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Forms
            </p>
        </header>
        <div class="card-content">
            <form method="get">
            <div class="field">
                <!-- <label class="label">From</label> -->
                <div class="field-body">
                    <div class="field">
                        <div class="control icons-left">
                            <input class="input" type="text" placeholder="Nama Gedung">
                            <span class="icon left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Deskripsi Gedung"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control icons-left">
                            <input class="input" type="text" placeholder="Alamat Gedung">
                            <span class="icon left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control icons-left icons-right">
                        <input class="input" type="email" placeholder="Email" value="alex@smith.com">
                        <span class="icon left"><i class="mdi mdi-mail"></i></span>
                        <!-- <span class="icon right"><i class="mdi mdi-check"></i></span> -->
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-body">
                        <div class="field">
                            <div class="field addons">
                            <div class="control">
                                <input class="input" value="+62" size="3" readonly>
                            </div>
                            <div class="control expanded">
                                <input class="input" type="tel" placeholder="Your phone number">
                            </div>
                            </div>
                            <p class="help">Do not enter the first zero</p>
                        </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">File Gambar Gedung</label>
                            <div class="field-body">
                                <div class="field file">
                                    <label class="upload control">
                                        <a class="button blue">
                                        Upload
                                        </a>
                                        <input type="file">
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="field">
                        <label class="label">Lokasi Gedung</label>
                            <div class="field-body">
                                <!-- TEMPAT GOOGLE MAPS -->
                            </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="field grouped">
                <div class="control">
                <button type="submit" class="button green">
                    Update
                </button>
                </div>
                <div class="control">
                <button type="reset" class="button red">
                    Cancel
                </button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </section>    

@endsection
