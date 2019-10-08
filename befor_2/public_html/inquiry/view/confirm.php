    <h1><?= $config->h2->confirm ?></h1>

    <section>
      <div class="container gutters">
        <div class="row inquiry">
          <div class="col span_12">
            <p>
              入力内容を確認し、正しければ送信ボタンをクリックしてください。<br>
              訂正する場合は、修正ボタンをクリックしてください。
            </p>
          </div>
        </div>
        <form method="post" action="submit.php" class="inquiry">
          <fieldset>
            <div class="row">
              <dl><?php for ($i = 0; $i < count($config->fields); $i++): ?>
                <dt class="col span_4">
                  <?php if (!isset($config->fields[$i]->connect) || $config->fields[$i]->connect == 'start'): ?>
                  <?= $config->fields[$i]->label ?>
                  <?php endif; ?>
                </dt>
                <dd class="col span_8">
                  <?php if (is_array(${'field_'.$i})): ?>
                  <p class="confirm"><?= implode('<br>', ${'field_'.$i}) ?></p>
                  <?php else: ?>
                  <p class="confirm">
                    <?= isset($config->fields[$i]->options->before)? $config->fields[$i]->options->before : '' ?>
                    <?= nl2br(htmlspecialchars(${'field_'.$i}, ENT_QUOTES, 'UTF-8')) ?>
                    <?= isset($config->fields[$i]->options->after)? $config->fields[$i]->options->after : '' ?>
                  </p>
                  <?php endif; ?>
                </dd>
              <?php endfor; ?></dl>
            </div>
          </fieldset>
          <div class="submit">
            <button type="button" class="button cancel" onclick="location.href='./<?= '?PHPSSID='.session_id(); ?>';"><span>修正する</span></button>
            <button type="submit" class="button"><span>　送信する　</span></button>
          </div>
        </form>
      </div>
    </section>
