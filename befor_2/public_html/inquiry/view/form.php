    <h1><?= $config->h1 ?></h1>

    <section>
      <div class="container gutters">
        <h2><?= $config->h2->index ?></h2>
        <div class="row inquiry">
          <div class="col span_12">
            <?php if (!empty($config_error)): ?>
            <ul style="margin:0 0 10px; border:10px solid red; padding:20px; color:red; font-size:20px; list-style:inside;">
              <?php foreach($config_error as $error): ?>
              <li><?= $error ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <p><?= $config->message ?></p>
          </div>
        </div>
        <form method="post" action="confirm.php" class="inquiry h-adr">
          <span class="p-country-name" style="display:none;">Japan</span>
          <fieldset>
            <div class="row">
              <dl><?php for ($i = 0; $i < count($config->fields); $i++): ?>
                <?php if (!isset($config->fields[$i]->connect) || $config->fields[$i]->connect == 'start'): ?>
                <dt class="col span_4">
                  <?= $form->showLabel($config->fields[$i]->label, !empty($config->fields[$i]->options->required)) ?>
                </dt>
                <dd class="col span_8">
                <?php endif; ?>
                  <?= $form->build($config->fields[$i]->type, 'field_'.$i, $config->fields[$i]->options) ?>
                  <?php if (!empty(${'field_'.$i.'_err'})): ?>
                    <p><?= ${'field_'.$i.'_err'} ?>&nbsp;</p>
                  <?php endif; ?>
                <?php if (!isset($config->fields[$i]->connect) || $config->fields[$i]->connect == 'end'): ?>
                </dd>
                <?php endif; ?>
              <?php endfor; ?></dl>
            </div>
          </fieldset>
          <div class="submit">
            <button type="submit" class="button"><span>上記の内容で確認する</span></button>
          </div>
        </form>
      </div>
    </section>
