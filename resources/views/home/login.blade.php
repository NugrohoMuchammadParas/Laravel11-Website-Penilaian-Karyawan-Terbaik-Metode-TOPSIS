<x-home>
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php if (session('data_flash')): ?>
                    <script>
                        function myFunction() {
                            var placementFrom = 'top';
                            var placementAlign = 'right';
                            var state = '<?= session('data_flash.state') ?>';
                            var style = 'withicon';
                            var content = {};

                            content.message = '<?= session('data_flash.message') ?>';
                            content.title = '<?= session('data_flash.title') ?>';
                            content.icon = '<?= session('data_flash.icon') ?>';
                            content.url = '';
                            content.target = "_blank";

                            $.notify(content, {
                                type: state,
                                placement: {
                                    from: placementFrom,
                                    align: placementAlign,
                                },
                                time: 1000,
                                delay: 5000,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                }
                            });
                        }

                        window.onload = myFunction;
                    </script>
                    <?php endif; ?>
                    <div class="row justify-content-center align-items-center mb-3 mt-5">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-8 col-8 ps-xl-0 ps-lg-0 ps-md-0 ps-sm-0 ps-xs-0">
                            <div class="card-pricing2 card-black shadow">
                                <div class="pricing-header">
                                    <h3 class="fw-bold mb-1">TOPSIS</h3>
                                    <span class="sub-title">Karyawan Terbaik</span>
                                </div>
                                <div class="price-value mb-4">
                                    <div class="value">
                                        <span class="amount">Login</span>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-8 offset-2 bg-black rounded shadow">
                                        <form action="login-data" method="POST" id="formInput" autocomplete="off">
                                            @csrf
                                            <hr style="color:white;">
                                            <div class="form-group @error('username') has-error has-feedback @enderror">
                                                <label for="username">Username :</label>
                                                <input type="text" name="username" class="form-control"
                                                    id="username" placeholder="Username">
                                                <small id="username"
                                                    class="form-text text-muted @error('username') text-danger @enderror">
                                                    @error('username')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="form-group @error('password') has-error has-feedback @enderror">
                                                <label for="password">Password :</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password" placeholder="Password">
                                                <small id="password"
                                                    class="form-text text-muted @error('password') text-danger @enderror">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <br>
                                            <button type="button" id="login"
                                                class="btn btn-sm btn-info btn-rounded w-75 fw-bold mb-1">Sign
                                                In</button>
                                            <hr style="color:white;">
                                            <label class="pb-2">Tidak Memiliki Akun ? </label>
                                            <button type="button" id="register" data-pages="<?= $register ?>"
                                                class="btn btn-sm btn-info btn-rounded w-75 fw-bold mb-1 mt-1">Sign
                                                Up</button>
                                            <hr style="color:white;">
                                        </form>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-home>
