<?php $filed = "leads.txt";
$isFirstRequest = true;
//show Form without errors
$isValidPhone = false;
$isValidName = false;
$isValidEmail = false;
if($_SERVER["REQUEST_METHOD"] == "GET"){
  if($isFirstRequest){
    $isValidPhone = true;
    $isValidName = true;
    $isValidEmail = true;
    $isFirstRequest = false;
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $isValidPhone = preg_match('/^\+38[0-9]{10}+$/', $phone);
  $isValidName = !empty($name);
  $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  echo $isValidPhone && $isValidName && $isValidEmail;
  if($isValidPhone && $isValidName && $isValidEmail){
    $leads = "Name: {$name}, email: {$email}, phone: {$phone}\n";
    $fp = fopen($filed, 'a');
    fwrite($fp, $leads);
    fclose($fp);
    header('Location: /');
    exit();
  }
}?> <!doctype html><html lang="en"><head><meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta name="viewport" content="width=device-width,initial-scale=1"/><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer"/><link rel="preconnect" href="https://fonts.googleapis.com"/><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/><link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700;900&display=swap" rel="stylesheet"/><link rel="preconnect" href="https://fonts.googleapis.com"/><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/><link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/><title>Document</title><script defer="defer" src="bundle.js"></script><link href="main.css" rel="stylesheet"></head><body><div class="page"><header class="header"><div class="header__overlay"></div><div class="header__wrapper"><div class="logo header__logo"><div class="logo__text">top signals</div><img src="./assets/images/logoHeader.svg" alt="logo" class="logo__image"/></div><button class="header__button">Получить консультацию</button></div></header><main class="main"><div class="headline"><div class="headline__wrapper"><div class="left-column"><h1 class="headline__heading">ТОРГОВЫЕ СИГНАЛЫ<br/>ОТ ЭКСПЕРТА КАЖДЫЙ ДЕНЬ В ВАШЕМ <span class="headline__telegram_marked">TELEGRAM</span></h1><form action="/" method="POST" class="headline__order-form form"><div class="form__input-wrapper"><label for="name" class="form__input-label form__name"></label> <input id="name" name="name" class="form__input <?php echo $isValidName ? '' : 'form__input_error'?>" placeholder="Введите имя" value="<?php echo $isValidName ? $_POST['name'] : '';; ?>" required/> <span class="errors <?php echo $isValidName ? '' : 'show'?>">Пустое имя</span></div><div class="form__input-wrapper"><label for="email" class="form__input-label form__email"></label> <input id="email" type="email" name="email" class="form__input <?php echo $isValidEmail ? '' : 'form__input_error'?>" placeholder="Email" value="<?php echo $isValidEmail ? $_POST['email'] : ''; ?>" required/> <span class="errors <?php echo $isValidEmail ? '' : 'show'?>">Не верный формат email</span></div><div class="form__input-wrapper"><label for="phone" class="form__input-label form__phone"></label> <input type="phone" id="phone" name="phone" class="form__input <?php echo $isValidPhone ? '' : 'form__input_error'?>" placeholder="Телефон" value="<?php echo $isValidPhone ? $_POST['phone'] : ''; ?>" required/> <span class="errors <?php echo $isValidPhone ? '' : 'show'?>">Не верный формат телефона</span></div><input type="submit" value="получить доступ" class="form__submit"/></form></div><div class="right-column"><img src="./assets/images/phone.png" alt="phone" class="phone"/></div></div></div><div class="features"><div class="features__wrapper"><div class="features__item"><h3 class="features__heading">3 рынка</h3><p class="features__description features__description_1">фондовый, товарный, валютный</p><div class="features__background">3</div><div class="features__separator"></div></div><div class="features__item"><h3 class="features__heading">15%</h3><p class="features__description features__description_2">средняя доходность в месяц</p><div class="features__background">15</div><div class="features__separator"></div></div><div class="features__item"><h3 class="features__heading">до 10</h3><p class="features__description features__description_3">торговых сигналов в день</p><div class="features__background">10</div><div class="features__separator"></div></div><div class="features__item"><h3 class="features__heading">до 90%</h3><p class="features__description features__description_4">прибыльность сигналов</p><div class="features__background">90</div><div class="features__separator"></div></div><div class="features__item"><h3 class="features__heading">от 80</h3><p class="features__description features__description_5">пунктов за сделку</p><div class="features__background features__background_5">80</div></div></div></div><div class="start-earning"><div class="start-earning__wrapper"><h2 class="start-earning__heading">как начать зарабатывать на ставках</h2><div class="column-wrapper"><div class="start-earning__left-column"><div class="column"><h3 class="column__heading">Как снизить риски при торговле по сигналам?</h3><p class="column__description">Сигналы можно протестировать на демо счете в течение недели, затем начать торговать минимальными объемами</p><div class="column__line column__line_right"></div></div><div class="column"><h3 class="column__heading">Как снизить риски при торговле по сигналам?</h3><p class="column__description">Сигналы можно протестировать на демо счете в течение недели, затем начать торговать минимальными объемами</p><div class="column__line column__line_right"></div></div></div><div class="start-earning__middle-column"><img src="./assets/images/phoneBigger.png" alt="phone" class="start-earning__image"/></div><div class="start-earning__right-column"><div class="column"><h3 class="column__heading">Как снизить риски при торговле по сигналам?</h3><p class="column__description">Сигналы можно протестировать на демо счете в течение недели, затем начать торговать минимальными объемами</p><div class="column__line column__line_left"></div></div><div class="column"><h3 class="column__heading">Как снизить риски при торговле по сигналам?</h3><p class="column__description">Сигналы можно протестировать на демо счете в течение недели, затем начать торговать минимальными объемами</p><div class="column__line column__line_left"></div></div></div></div></div></div></main></div></body></html>