<?php include_once '../Head/head.php';

//$conn = new mysqli('onnjomlc4vqc55fw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'zzh9ipcx4q2axcja', 'q9ftbyspaefuwmkd', 'Dijitrail DB With Heroku');
//
//if (isset($_POST['save'])) {
//    $uID = $conn->real_escape_string($_POST['uID']);
//    $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
//    $ratedIndex++;
//
//    if (!$uID) {
//        $conn->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
//        $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
//        $uData = $sql->fetch_assoc();
//        $uID = $uData['id'];
//    } else
//        $conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");
//
//    exit(json_encode(array('id' => $uID)));
//}
//
//$sql = $conn->query("SELECT id FROM stars");
//$numR = $sql->num_rows;
//
//$sql = $conn->query("SELECT SUM(rateIndex) AS total FROM stars");
//$rData = $sql->fetch_array();
//$total = $rData['total'];
//
//$avg = $total / $numR;
?>

    <header>
        <form method=post action="do_addtopic.php">
            <p><strong>Your E-Mail Address:</strong><br>
                <input type="text" name="topic_owner" size=40 maxlength=150>
            <p><strong>Topic Title:</strong><br>
                <input type="text" name="topic_title" size=40 maxlength=150>
            <p><strong>Post Text:</strong><br>
                <textarea name="post_text" rows=8 cols=40 wrap=virtual></textarea>
            <p><input type="submit" name="submit" value="Add Topic"></p>
        </form>
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

           function saveToTheDB() {
           $.ajax({
              url: "index.php",
              method: "POST",
              dataType: 'json',
              data: {
                  save: 1,
                  uID: uID,
                  ratedIndex: ratedIndex
              }, success: function (r) {
                   uID = r.id;
                   localStorage.setItem('uID', uID);
              }
           });
        }
    </script>
<?php include_once '../Footer/footer.php'; ?>

