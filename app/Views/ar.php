<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.5/dist/mindar-image.prod.js"></script>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.5/dist/mindar-image-aframe.prod.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    <style>
        /*a-scene{
            width: 100%;

            overflow: visible;
        }
       .vid{
           width: 50%;
           margin-left: 5%;
           z-index: -301;

       }*/
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sceneEl = document.querySelector('a-scene');
            const arSystem = sceneEl.systems["mindar-image-system"];
            const exampleTarget = document.querySelector('#example-target');
            const Vid = document.getElementsByTagName('video')

            // detect target found
            exampleTarget.addEventListener("targetFound", event => {
               alert('found')
            });
            // detect target lost
            exampleTarget.addEventListener("targetLost", event => {
               // console.log("target lost");
            });

        });
    </script>
</head>
<body>
<div class="row justify-content-center">
    <h2 class="text-center text-white">Наша виртуальная сказка</h2>
</div>
<div class="container-fluid">
    <a-scene mindar-image="imageTargetSrc: ./targets/targets.mind; uiScanning:no; uiLoading:no"
             vr-mode-ui="enabled: false"
             device-orientation-permission-ui="enabled: false" >

        <a-assets>
            <img id="card" src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.2.2/examples/image-tracking/assets/card-example/card.png" />
            <!--<img id="card" src="./skazkaPhoto/card-counter.png" />-->
            <img id="office" src="./skazkaPhoto/card-2.png" />
        </a-assets>

        <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>
        <a-entity mindar-image-target="targetIndex: 0">
            <a-plane src="#card" position="0 0 0" height="0.552" width="1" rotation="0 0 0"></a-plane>
           <a-gltf-model rotation="0 0 0 " position="0 0 0.1" scale="0.005 0.005 0.005" src="#avatarModel" animation="property: position; to: 0 0.1 0.1; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate">
        </a-entity>
        <a-entity mindar-image-target="targetIndex: 1">
            <a-plane src="#office" position="0 0 0" height="0.552" width="1" rotation="0 0 0"></a-plane>
            <a-gltf-model rotation="0 0 0 " position="0 0 0.1" scale="0.005 0.005 0.005" src="#avatarModel" animation="property: position; to: 0 0.1 0.1; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate">
        </a-entity>
    </a-scene>
</div>
<div class="container">
    <div class="row mt-5" id="app">

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    const Appl = new Vue({
        el:'#app',
        data:{

        },
        methods:{

        }
    })
</script>
</body>
</html>
