const fsButton = document.getElementById('fsButton');
                
                    fsButton.addEventListener('click', FStog);
                
                    function FStog() {
                        if (document.fullscreenElement) {

                            document.exitFullscreen();
                        } else {

                            document.documentElement.requestFullscreen();
                        }
                    }