<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">

            <?php foreach($categories as $category): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($category); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!--заполните этот список из массива с товарами-->
            <?php foreach ($lots as $lot): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=htmlspecialchars($lot['pic']); ?>" width="350" height="260" alt="<?=$lot['title']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=htmlspecialchars($lot['сategory']); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($lot['title']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?=$lot['price']; ?></span>
                            <span class="lot__cost"><?= htmlspecialchars(formatAmount($lot["price"])); ?></span>
                        </div>
                        <?php
                        list($hours, $minutes) = remainingTime($lot['expires']);
                        $time = sprintf('%02d:%02d', $hours, $minutes);
                        $class = ($hours < 1) ? "timer--finishing" : '';
                        ?>
                        <div class="lot__timer timer <?= $class; ?>">
                            <?=$time;?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>