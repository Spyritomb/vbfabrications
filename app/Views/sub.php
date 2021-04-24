<div class="wrapper fadeInDown">

    <div class="container text-center">

        <div class="row">
            <div class="col">
                <div>Please press start then, press "Allow" on the pop up to give access to your webcam.</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="p-4" id="content"></div>
            </div>
        </div>
        <div class="text-md-right">
        <div id="msg"><?php for($x=0; $x<=42; $x++){ echo "&nbsp";} ?></div>
        </div>
            <div class="row border border-dark rounded">
<!--                display thhe camera on the left sidee of the table-->
            <div class="col border-right border-dark">
                <div id="webcam-container"></div>
            </div>


<!--             print the results on the right side of the table   -->
            <div class="col border-left border-dark">
                <div id="label-container" class="border"></div>
                <div id="test"><?php for($x=0; $x<=42; $x++){ echo "&nbsp";} ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button class="btn btn-success mt-5" type="button" onclick="init()">
                    <div id="btn"></div>
                </button>
            </div>
        </div>

    </div>


    <!--    <div>Note: Make sure to point the camera at the object and as much as possible be at a bright room.</div>-->


    <br>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
    <link href="../../public/assets/css/stylesheet.css" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script type="text/javascript">

        // More API functions here:
        // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

        // the link to model, provided by Teachable Machine export panel
        //const URL = "https://teachablemachine.withgoogle.com/models/dPBFOBuhn/";
        const URL = "https://teachablemachine.withgoogle.com/models/f4hN5EAOX/";


        let model, webcam, labelContainer, maxPredictions, label,test;

        document.getElementById('btn').innerHTML = 'Start'



        // Load the image model and setup the webcam
        async function init() {

            document.getElementById('content').innerHTML = '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'

            setTimeout(function () {
                document.getElementById('content').innerHTML = '';
                document.getElementById('msg').innerHTML = 'Is this what you are looking for?'
            }, 7000)

            setTimeout(function () {
                document.getElementById('btn').innerHTML = 'Stop'

            })

            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";
            // load the model and metadata
            // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
            // or files from your local hard drive
            // Note: the pose library adds "tmImage" object to your window (window.tmImage)
            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();

            // Convenience function to setup a webcam
            const flip = true; // whether to flip the webcam
            webcam = new tmImage.Webcam(400, 400, flip); // width, height, flip
            await webcam.setup(); // request access to the webcam
            await webcam.play();
            window.requestAnimationFrame(loop);

            // append elements to the DOM
            document.getElementById("webcam-container").appendChild(webcam.canvas);
            labelContainer = document.getElementById("label-container");
            test=document.getElementById("test");
            for (let i = 0; i < maxPredictions; i++) { // and class labels
                labelContainer.appendChild(document.createElement("div"));
                test.appendChild(document.createElement("div"));
                labelContainer.className = "labels";
                test.className="results";
                 //test.className = "results"+i;
            }
        }

        async function loop() {
            webcam.update(); // update the webcam frame
            await predict();
            window.requestAnimationFrame(loop);
        }

        // run the webcam image through the image model
        async function predict() {
            // predict can take in an image, video or canvas html element
            const prediction = await model.predict(webcam.canvas);
            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction = prediction[i].className;
                //prediction[i].className + ": " + prediction[i].probability.toFixed(2);// Indication of percentage
                if (prediction[i].probability > 0.7) {
                    labelContainer.childNodes[i].innerHTML = classPrediction+'<br><img src="images/'+classPrediction+'.jpg" width="50%"/>';
                    //test.childNodes[i].innerHTML=classPrediction;
                    //test.childNodes[i].innerHTML='<img src="images/'+classPrediction+'.jpg" width="50%"/> ';
                    // test.childNodes[i].innerHTML='<img src="images/Wood.jpg" width="50%"/> ';
                     console.log('-'+classPrediction+'-'+i+"-");

/*
                    if(classPrediction=='Wood'){
                        var imgsrc = '<img src="images/Wood.jpg" width="50%"/> ';

                        test.childNodes[i].innerHTML=imgsrc;
                        console.log(test.childNodes[i].innerHTML);
                    }else if(classPrediction=='Wallet'){
                        test.childNodes[i].innerHTML='<img src="images/Wallet.jpg" width="50%"/> ';
                    }else{

                    }
*/


                } else {
                    labelContainer.childNodes[i].innerHTML = " ";
                    test.childNodes[i].innerHTML=" ";
                }
            }
        }

    </script>

</div>
