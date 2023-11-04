<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Web интерфейс телеграм приложения для сотрудников</title>
    <!-- MDB icon -->
    <link rel="icon" href="telega/img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- Dark MDB theme -->
    <link rel="stylesheet" href="/telega/css/mdb.dark.min.css" />
    <link rel="stylesheet" href="/telega/css/nav.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
</head>
<body>
    <div id="work">
        <div class="container" id="app" >
        <!-- Section: Components -->
        <section class="">
            <section id="demo" class="">
                <input type="checkbox" id="side-checkbox" v-model="panel" />
                <div class="side-panel">
                    <div class="side-title" v-on:click="changeMode('default')" v-text="staffName">Имя пользователя</div>
                        <p v-on:click="changeMode('generate')"><i class="fas fa-qrcode"></i> Создать QR код</p>

                        <hr/>
                      <!--  <p class="my-5 text-center" v-on:click="changeMode('scan')"><i class="fas fa-barcode"></i>&nbsp;&nbsp; Сканировать QR клиента</p>-->
                </div>

        <!-- Section: Components -->
    </div>
        <section id="scan" v-on:click="panel=false">
        <div class="container-fluid">
            <section class="">
               <div v-show="default_view" style="background-image: url(/telega/img/default.JPG)">
                   <h1 class="text-center mb-5">культурное кафе "Маяковский"</h1>
                   <div class="position-absolute top-50 start-50 translate-middle"></div>
                       <div class="container" style="max-height: 50%">
                           <img src="/telega/img/mainQR.jpg" class="img-fluid"/>
                       </div>
                   </div>

               </div>
                <div v-show="scan_view">
                   <!-- <div class="container">
                        <div id="video-container">
                            <video id="qr-video" style="max-width: 100%; max-height: 50%"></video>
                        </div>
                        <div>
                            <b>Прочитанный QR: </b>
                            <span id="cam-qr-result">None</span>
                        </div>
                    </div>-->
                </div>
                <div v-show="generate_view">
                    <h1 class="text-center">Начисление бонусов:</h1>
                    <div class="my-3">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <template v-if="checkEdit==true">
                                    <input type="number" v-model="chekSumm" class="form-control" placeholder="Сумма счёта">
                                    <div class="mt-3 container">
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="row justify-content-between">
                                                    <div class="col mt-2 mb-2">
                                                        <div class="row">
                                                        <button class="btn btn-rounded btn-sm btn-warning" v-on:click="sub(15)">
                                                            15%
                                                        </button>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2 mb-2">
                                                        <div class="row">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2 mb-2">
                                                        <div class="row">
                                                        <button class="btn btn-rounded btn-sm btn-warning" v-on:click="sub(10)">
                                                            10%
                                                        </button>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2 mb-2">
                                                        <div class="row">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2 mb-2">
                                                        <div class="row">
                                                        <button class="btn btn-rounded btn-sm btn-warning" v-on:click="sub(5)">
                                                            5%
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else>
                                    <h4 class="text-center">Сумма счёта</h4>
                                    <p class="text-center mt-4" v-text="chekSumm+' р.'"></p>
                                    <h2 class="text-center">Бонусов к зачислению</h2>
                                    <h1 class="text-center mt-2 mb-4 text-success" v-text="Bonus+' р.' "></h1>
                                    <div class="row justify-content-center">
                                        <img v-bind:src="QRimg"  class="img-fluid"/>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- End your project here-->
    </div>
    <div id="foot">
        <section>
            <footer class="bg-dark text-center text-lg-start" style="position: fixed; bottom: 0px; width: 100%">
            <div
                    class="text-center p-3"
                    style="background-color: rgba(0, 0, 0, 0.2)"
            >
                <i class="fas fa-bars" v-on:click="openNav"></i>

            </div>

        </footer>
        </section>
    </div>
<!-- MDB -->
<script type="text/javascript" src="/telega/js/mdb.min.js"></script>
<!-- Custom scripts -->
    <!--<script type="module">
        import QrScanner from "/assets/js/qr-scanner.min.js";
        const video = document.getElementById('qr-video');
        const videoContainer = document.getElementById('video-container');
        const camHasCamera = document.getElementById('cam-has-camera');
        const camList = document.getElementById('cam-list');
        const camHasFlash = document.getElementById('cam-has-flash');
        const flashToggle = document.getElementById('flash-toggle');
        const flashState = document.getElementById('flash-state');
        const camQrResult = document.getElementById('cam-qr-result');
        const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
        const fileSelector = document.getElementById('file-selector');
        const fileQrResult = document.getElementById('file-qr-result');

        function setResult(label, result) {
           // console.log(result.data+ ' has detected');
            label.textContent = result.data;
            label.style.color = 'teal';
        }

        // ####### Web Cam Scanning #######

        const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
            onDecodeError: error => {
                camQrResult.textContent = error;
                camQrResult.style.color = 'inherit';
            },
            highlightScanRegion: true,
            highlightCodeOutline: true,
        });

        const updateFlashAvailability = () => {
            scanner.hasFlash().then(hasFlash => {
                camHasFlash.textContent = hasFlash;
                flashToggle.style.display = hasFlash ? 'inline-block' : 'none';
            });
        };

        scanner.start().then(() => {
            updateFlashAvailability();
            // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
            // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
            // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
            // start the scanner earlier.
            QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
                const option = document.createElement('option');
                option.value = camera.id;
                option.text = camera.label;
                camList.add(option);
            }));
        });

        QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);
        //window.scanner = scanner;
    </script>-->
<script type="text/javascript">
    const telega = window.Telegram.WebApp;
    const App = new Vue({
        el:'#work',
        data:{
            staffName:'Руслан',
            panel:false,
            mode:'default',
            chekSumm:null,
            default_view:true,
            scan_view:false,
            generate_view:false,
            checkEdit:true,
            QRimg:null,
            Bonus:null
        },
        methods:{
            changeMode(modeName){
                if(modeName == 'default'){
                    this.scan_view = false
                    this.generate_view = false
                    this.default_view = true
                }
                if(modeName == 'scan'){
                    this.generate_view = false
                    this.default_view = false
                    this.scan_view = true
                }
                if(modeName == 'generate'){
                    this.chekSumm = null
                    this.checkEdit = true
                    this.default_view = false
                    this.scan_view = false
                    this.generate_view = true
                    this.QRimg = null
                    this.Bonus = null
                }
                this.panel = false
                return this.mode=modeName
            },
            sub(proc){
                let forma = {
                    '<?=csrf_token()?>':'<?=csrf_hash()?>',
                    'summa':this.chekSumm,
                    'proc':proc,
                    'staff':this.staffName
                }
                axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                axios.post('/addBonus',forma).then(res=>{
                    this.checkEdit = false
                    this.chekSumm = res.data.summa
                    this.Bonus = res.data.bonus
                    this.QRimg = res.data.img

                })
            }
        },
        mounted(){
            let userInfo = telega.initDataUnsafe
            let userId = userInfo.user.id
            this.staffName = userInfo.user.first_name
            if (userId == 822173207 ){
                telega.expand()
                // telega.close()
            }
            else if(userId == 5598318350){
                telega.expand()
            }
            else if(userId == 1272846173){
                telega.expand()
            }
            else{
                telega.close()
            }
        }
    })
</script>
    <script type="text/javascript">
        const Foot = new Vue({
            el:'#foot',
            data:{

            },
            methods:{
                openNav(){
                    if(App.panel == true) {
                        App.panel = false
                    }
                    else{
                        App.panel = true
                    }
                }
            }
        })
    </script>

</body>
</html>

