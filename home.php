<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <style>
            .highlighted {
                background-color: pink;
            }
        </style>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Home - AT2 Sprint 2</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>

        <div class="container-fluid mb-4 mt-4">
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="d-flex justify-content-center align-items-center">                
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../images\waterliliesandjapanesebridge.gif" class="d-block" alt="first_one" width="400" height="400">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images\weaver.gif" class="d-block" alt="second_one" width="400" height="400">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images\donitondo2.gif" class="d-block" alt="third_one" width="400" height="400">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-4 d-flex justify-content-center align-items-center">  
                    <div class="text-center">
                        <h2 id="maintitle"><strong>Acme Arts</strong></h2><br><br>
                        <button id="readButton" type="button" class="btn btn-success">Start Reading</button> 
                        <p id="status"></p>

                        <p class="lead">
                            Welcome to the Acme Arts' Gallery<br>
                            World Class Artists<br>
                            Collectible Paintings<br>
                            Presented to you by KING RABBIT<br>
                        </p>
                    </div>                    
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">

                </div>
            </div>
            <div class="text-center mt-4">
                <h2 id="maintitle" >Team <img src="../images/logo.png" class="img-thumbnail" alt="logo" width="100" height="100"></h2>

                <p class="lead">
                    Team name:  King Rabbit <br>
                    Team Leader: Francis Sullivan<br>
                    Team Member #1: Derrick Choong<br>
                    Team Member #2: Dongyun Huang<br>
                </p>
            </div>
        </div>

        <script>
            const readButton = document.getElementById('readButton');
            const statusParagraph = document.getElementById('status');
            let isReading = false;
            let speech = null;
            let words = [];

            readButton.addEventListener('click', () => {
                const paragraphs = document.querySelectorAll('p');
                const paragraphsText = Array.from(paragraphs).map(paragraph => paragraph.textContent).join(' ');

                words = paragraphsText.split(/\s+/); // Split text into individual words

                if (!isReading) {
                    // Start reading
                    speech = new SpeechSynthesisUtterance(paragraphsText);
                    speechSynthesis.speak(speech);
                    readButton.textContent = 'Pause Reading';
                    statusParagraph.textContent = 'Reading in progress...';
                } else {
                    // Pause reading
                    speechSynthesis.cancel();
                    readButton.textContent = 'Resume Reading';
                    statusParagraph.textContent = 'Reading paused';
                }

                isReading = !isReading;
            });

            // Highlight the word at the given index
            function highlightWord(index) {
                const wordElement = document.getElementById('word-' + index);
                if (wordElement) {
                    wordElement.classList.add('highlighted');
                }
            }

            // Reset the highlighting
            function resetHighlighting() {
                const highlightedWords = document.querySelectorAll('.highlighted');
                highlightedWords.forEach(wordElement => {
                    wordElement.classList.remove('highlighted');
                });
            }

            // Highlight words as speech progresses
            speechSynthesis.addEventListener('boundary', event => {
                if (event.name === 'word') {
                    const charIndex = event.charIndex;
                    let wordIndex = 0;

                    for (let i = 0; i < words.length; i++) {
                        const word = words[i];
                        if (charIndex >= wordIndex && charIndex < wordIndex + word.length) {
                            resetHighlighting();
                            highlightWord(i);
                            break;
                        }
                        wordIndex += word.length + 1; // +1 for space
                    }
                }
            });
        </script>

        <?php
        include_once('../components/footer.php');
        ?>
    </body>
</html>