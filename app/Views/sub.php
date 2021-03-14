<div class="wrapper fadeInDown">
    <div>Please press start and give access to your webcam.</div>
    <div>Note: Make sure to point the camera at the object and as much as possible be at a bright room.</div>
    <br>
    <div id="webcam-container"></div>
    <br>
    <div id="label-container"></div>
    <br>
    <button class="btn btn-primary" type="button" onclick="init()">Start</button>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
    <link href="../../public/assets/css/stylesheet.css" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // More API functions here:
        // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

        // the link to your model provided by Teachable Machine export panel
        const URL = "https://teachablemachine.withgoogle.com/models/dPBFOBuhn/";

        let model, webcam, labelContainer, maxPredictions;

        // Load the image model and setup the webcam
        async function init() {

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
            webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip
            await webcam.setup(); // request access to the webcam
            await webcam.play();
            window.requestAnimationFrame(loop);

            // append elements to the DOM
            document.getElementById("webcam-container").appendChild(webcam.canvas);
            labelContainer = document.getElementById("label-container");
            for (let i = 0; i < maxPredictions; i++) { // and class labels
                labelContainer.appendChild(document.createElement("div"));
                 labelContainer.className = "results";
                // displaying.className = "results"+i;
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
                const classPrediction =
                    prediction[i].className;
                    //prediction[i].className + ": " + prediction[i].probability.toFixed(2);// use this to show the number
                if( prediction[i].probability > 0.7){
                labelContainer.childNodes[i].innerHTML = classPrediction;
                }else{
                labelContainer.childNodes[i].innerHTML = "...";
                }
            }
        }
    </script>

<!--    <div class="card" style="width: 18rem;">-->
<!--        <div class="card-header">-->
<!--            Featured-->
<!--        </div>-->
<!--        <ul class="list-group list-group-flush">-->
<!--            <li class="list-group-item" id="first">Cras justo odio</li>-->
<!--            <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--            <li class="list-group-item">Vestibulum at eros</li>-->
<!--        </ul>-->
<!--    </div>-->

</div>