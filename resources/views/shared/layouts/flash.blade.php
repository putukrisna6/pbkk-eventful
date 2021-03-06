@if (session('error'))
    <section class="section main-section">
        <div class="notification red">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                    <span class="icon"><i class="mdi mdi-buffer"></i></span>
                    <b>{{ session('error') }}</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">
                    <span class="icon left"><i class="mdi mdi-close"></i>
                    </span>
                </button>
            </div>
        </div>
    </section>
@elseif (session('success'))
    <section class="section main-section">
        <div class="notification green">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                    <span class="icon"><i class="mdi mdi-buffer"></i></span>
                    <b>{{ session('success') }}</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">
                    <span class="icon left"><i class="mdi mdi-close"></i>
                    </span>
                </button>
            </div>
        </div>
    </section>
@endif
