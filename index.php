<?php
function getInfoUsername($username)
{
    $data = file_get_contents("https://sayat.keko.dev/api.php?username=" . urlencode($username));
    if (!empty($data) and json_decode($data)->ok == true) {
        return json_decode($data);
    } else {
        return false;
    }
}
if (isset($_GET["u"]) and !empty($_GET["u"])) {
    $info = getInfoUsername($_GET["u"]);
    if ($info != false) {
        $name = $info->name;
        $username = $_GET["u"];
        $photo = $info->photo;
    } else {
        header("Location: https://keko.dev");
        exit(0);
    }
} else {
    header("Location: https://keko.dev");
    exit(0);
}
if (!isset($name)) {
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($name); ?></title>
    <link rel="icon" type="image/gif/png" href="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg">
    <link rel="stylesheet" href="https://bot.keko.dev/bootstrap.min.css">
    <link rel="stylesheet" href="main.css?<?php echo rand(0, 10000); ?>=<?php echo rand(0, 10000); ?>">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand"  href="tg://resolve?domain=<?php echo htmlspecialchars($username); ?>">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" width="35" height="33" class="img-responsive d-inline-block align-top" alt="">
            <?php echo htmlspecialchars($username); ?>
        </a>
        <a style="color:#5166c3" ><?php echo htmlspecialchars($name); ?></a>
    </nav>
    <center>
    <a class="tgme_head_dl_button" href="tg://resolve?domain=<?php echo htmlspecialchars($username); ?>">
    أكتب رسالة إلى <bdi ><?php echo htmlspecialchars($name); ?></bdi> دون ان يعرفك
        </a>
<div class="card" id="content">
  <div class="card-top-section">
    <img width="10%" height="10%" class="card-img-top rounded-circle" src="<?php echo $photo; ?>" alt="image">
  </div>
  <div class="card-block">
    <h4 class="card-title">. </h4>
    <div class="form-group">
    <br>
    <textarea id="textareakeko" dir="rtl" rows="7" cols="35" maxlength="500" placeholder="هناك شيء تريد قوله لـ <?php echo htmlspecialchars($name); ?> ، بدون ان يعرفك ؟ أكتب هنا" class="textarea" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 144px;"></textarea>
  </div>
  <label id="error">
</label>
  </div>
  <div class="card-action" id="sendbkeko">
    <a onclick='send_keko("<?php echo htmlspecialchars($username); ?>")' style="background-color:#2D2F31;color:#f8f9fa; width:90%;margin:10px;border:0;direction: ltr;" href="#" class="btn wave-ripples"><i class="fa fa-info"></i><img src="https://sayat.keko.dev/sent.svg" alt="#" style="vertical-align:middle;" width="22" height="auto"> أرسال الآن </a>
  </div>
</div>
        <div class="fixed-bottom endwebsite">
            <a href="tg://resolve?domain=MkFrBot">
                powered by <img src="https://bot.keko.dev/Echo png.png" width="35" height="33" class="img-responsive d-inline-block align-top" alt=""> <strong> Telegram Bots</strong><i class="tgme_icon_arrow"></i>
            </a>
        </div>
        </center>
    <script src="https://bot.keko.dev/jquery.js"></script>
    <script src="https://bot.keko.dev/bootstrap.min.js"></script>
    <script src="main.js?<?php echo rand(0, 10000); ?>=<?php echo rand(0, 10000); ?>"></script>
</body>
</html>
