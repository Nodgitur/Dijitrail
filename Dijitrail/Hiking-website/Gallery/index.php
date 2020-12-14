<?php include_once '../Head/head.php'; ?>
    <header>
        <div id = "container">
            <div class = "outerDiv">
                <div class = "leftDiv">West</div>
                <div class = "rightDiv">East</div>
            </div>
            <div class = "row">
                <div class = "column">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../Nrate//Rating1.html">
                    <img src = "Connacht.png" alt = "West" title = "West" class = "provinces">
                        </a>
                </div>
                <div class = "column">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../Nrate//Rating1.html">
                    <img src = "Leinster.png" alt = "East" title = "East" class = "provinces">
                        </a>
                </div>
            </div>
            <div class = "outerDiv">
                <div class = "leftDiv">North</div>
                <div class = "rightDiv">South</div>
            </div>
            <div class = "row">
                <div class = "column">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../Nrate//Rating1.html">
                    <img src = "Ulster.png" alt = "North" title = "North" class = "provinces">
                        </a>
                </div>
                <div class = "column">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../Nrate//Rating1.html">
                    <img src = "Munster.png" alt = "South" title = "South" class = "provinces">
                        </a>
                </div>
            </div>
        </div>
    </header>
    <div align="center" style="background: #000; padding: 50px;">
        <i class="fa fa-star fa-2x" data-index="0"></i>
        <i class="fa fa-star fa-2x" data-index="1"></i>
        <i class="fa fa-star fa-2x" data-index="2"></i>
        <i class="fa fa-star fa-2x" data-index="3"></i>
        <i class="fa fa-star fa-2x" data-index="4"></i>
    </div>
    <script>
        var ratedIndex = -1;

        $(document).ready(function () {
            resetStarcolors();

            if (localStorage.getItem('ratedIndex') != null)
                setStars(parseInt(localStorage.getItem('ratedIndex')));
            // uID = localStorage.getItem('uID');

            $('.fa-star').on('click', function () {
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
            });

            $('.fa-star').mouseover(function () {
                resetStarcolors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function () {
                resetStarcolors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });

        function setStars(max) {
            for (var i = 0; i <= max; i++)
                $('.fa-star:eq(' + i + ')').css('color', 'green');
        }
        function resetStarcolors() {
            $('.fa-star').css('color', 'white');
        }

        //function saveToTheDB() {
        //    $.ajax({
        //       url: "index.php",
        //       method: "POST",
        //       dataType: 'json',
        //       data: {
        //           save: 1,
        //           uID: uID,
        //           ratedIndex: ratedIndex
        //       }, success: function (r) {
        //            uID = r.id;
        //            localStorage.setItem('uID', uID);
        //       }
        //    });
        //}


    </script>
<?php include_once '../Footer/footer.php'; ?>
