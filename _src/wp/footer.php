<?php
wp_footer();
include($root_path . "/assets/inc/_l-foot.php");
?>
<?php if (is_singular('post')) : ?>
  <script type="text/javascript">
    $(function() {
      var idcount = 1;
      var toc = '';
      var currentlevel = 0;
      var level = 1;
      $(".p-blog__detail__body h2,.p-blog__detail__body h3", this).each(function() {
        this.id = "toc_" + idcount;
        idcount++;
        if (this.nodeName.toLowerCase() == "h2") {
          if (level == 1) {
            toc += '<a href="#' + this.id + '" data-anc="' + this.id + '" class="anc level' + level + '">' + $(this).html() + "<\/a>";
          } else if (level == 2) {
            toc += '</div><a href="#' + this.id + '" data-anc="' + this.id + '" class="anc level' + level + '">' + $(this).html() + "<\/a>";
          }
          level = 1;
        } else if (this.nodeName.toLowerCase() == "h3") {
          if (level == 1) {
            toc += '<div class="h3list"><a href="#' + this.id + '" data-anc="' + this.id + '" class="anc level' + level + '">' + $(this).html() + "<\/a>";
          } else if (level == 2) {
            toc += '<a href="#' + this.id + '" data-anc="' + this.id + '" class="anc level' + level + '">' + $(this).html() + "<\/a>";
          }
          level = 2;
        }

      });
      if (toc != null) {
        toc = '<div class="agenda"><div class="agenda__ttl">目次</div><div class="h2list">' + toc + '</div></div>';
      }
      $(".p-blog__detail__head").append(toc);
    });
  </script>
<?php endif; ?>
</body>

</html>
