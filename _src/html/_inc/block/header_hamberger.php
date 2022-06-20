<?php $hbgclass = "l-hbg"; ?>
<div class="<?php echo  $hbgclass; ?>__icon">
  <a href="javascript:void(0);" class="js-hbgicon">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </a>
</div>
<div class="js-hbgmenu <?php echo  $hbgclass; ?>__modal">
  <div class="<?php echo  $hbgclass; ?>__modal__wrap">
    <div class="<?php echo  $hbgclass; ?>__modal__inner">
      <div class="<?php echo  $hbgclass; ?>__modal__info">
        <div class="p-info__w">
          <a href="<?php echo $link_path; ?>/" class="p-info__logo"><span class="p-svg__logo"><?php setHtmlSvg('logo'); ?><span><?php echo $site_title; ?></span></span></a>
          <p class="p-info__add">
            <?php echo $zip; ?><br>
            <?php echo $add; ?><br>
            <?php echo $buil; ?><br>
          </p>
          <p class="p-info__add">
            TEL : <?php setHtmlLink(array('url' => setHtmlTel($tel), 'title' => $tel, 'target' => ''), 'p-link__c1'); ?> / FAX : <?php setHtmlLink(array('url' => setHtmlTel($fax), 'title' => $fax, 'target' => ''), 'p-link__c1'); ?><br>
            営業時間 : 8:00 -17:00 / 定休日 : 土・日・祝
          </p>
          <ul class="p-info__sns">
            <?php foreach ($snslist as $sns) : ?>
              <li>
                <a href="<?php echo $sns['link'] ?>" target="_blank" class="<?php echo $hbgclass; ?>__sns__link">
                  <?php setHtmlSvg($sns['icon']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php
      $headerCol = array(
        'spnav' => 'nav',
        'spnav_sub' => 'subnav',
      );
      foreach ($headerCol as $headerkey => $headervalue) :
        $hbgNavClass = $hbgclass . '__modal';
      ?>
        <div class="<?php echo $hbgNavClass; ?>__col">
          <nav class="<?php echo $hbgNavClass; ?>__nav">
            <ul class="<?php echo $hbgNavClass; ?>__nav__ul">
              <?php foreach ($menu_list as $slug => $value) {
                setHtmlNavLink($slug, $value, $headerkey, $hbgNavClass . '__' . $headervalue, "");
              } ?>
            </ul>
          </nav>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
