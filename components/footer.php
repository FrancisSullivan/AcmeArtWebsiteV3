<footer>
<p class="copyright text-center"><a href="../admin/log_in.php" class="btn">Admin Panel </a> © 2023 King Rabbit.</p>
</footer>

<script>
                const readButton = document.getElementById('readButton');
                const statusParagraph = document.getElementById('status');
                let isReading = false; // Keep track of the reading state

                readButton.addEventListener('click', () => {
                    const paragraphs = document.querySelectorAll('h5, p'); // Select all titles & paragraphs
                    const paragraphsText = Array.from(paragraphs).map(paragraph => paragraph.textContent).join(' ');

                    if (!isReading) {
                        // Start reading
                        const speech = new SpeechSynthesisUtterance(paragraphsText);
                        speechSynthesis.speak(speech);
                        readButton.textContent = 'Pause Reading';
                        statusParagraph.textContent = 'Reading in progress...';
                    } else {
                        // Pause reading
                        speechSynthesis.cancel();
                        readButton.textContent = 'Resume Reading';
                        statusParagraph.textContent = 'Reading paused';
                    }

                    isReading = !isReading; // Toggle the reading state
                });
            </script>