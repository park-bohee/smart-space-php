<?php include("header.php"); ?>
<section class="section-th">
  <p class="phrase">반려동물을 찾으시는 분은 '유기동물 보호중이에요' 에서 찾아주세요</p>
  <div>
    <a href="find-write.php" class="btn btn-success">
      반려동물 등록하기
      <img src="image/header/dog.png" alt="버튼 이미지" width="22.5">
    </a>
  </div>
  <?php
    $sql = "SELECT * FROM fdfind";
    $rs = $db->query($sql);
    $rows = $rs->fetchAll();
    foreach($rows as $row):
      $id = $row['id'];
      $filemain = $row['filemain'];
      $src = "./uploads/find/{$filemain}";
      
      $sql_cnt = "SELECT count(*) FROM fdfindcmt WHERE no={$id}";
      $rs_cnt = $db->query($sql_cnt);
      $row_cnt = $rs_cnt->fetch();
  ?>
  <article>
    <a href="find-view.php?id=<?php echo $row['id'];?>">
      <div class="animal-img">
        <img src="<?php echo $src;?>" alt="대표 이미지" height="240">
      </div>
        <p><?php echo $row['farea']; ?> <?php echo $row['kinds']; ?></p>
      <div class="msg-icon">
        <i class="far fa-clock"></i>
        <span><?php echo $row['ftime']; ?></span>
        <i class="far fa-comment"></i>
        <span><?php echo $row_cnt['count(*)']; ?></span>
      </div>
    </a>
  </article>
  <?php endforeach; ?>
</section>
<?php include("footer.php"); ?>