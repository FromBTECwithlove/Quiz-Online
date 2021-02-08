<header class="header">
  <div class="logo">
    <a href="index.php?page=index"><img src="../img/Logo.png" alt="" class="logo-image"></a>
  </div>
  <div class="user-logout" style="cursor: pointer;">
    <label for="user-logout-click">
      <?php
      include '../db_config/connection.php';
      $sql = "SELECT * FROM tinhtv_admin where username='$myusername'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          $avatar = $row['img_dd'];
          $gender = $row['gender'];
          $Depart = $row['department'];
          $name = $row['fullname'];
          echo '<img src="../dist/img/'.$avatar.'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
        }
      }
      $conn->close();
      ?>
      <span class="hidden-xs">
        <?php
        echo $current_user;
        echo $name;
        ?>
      </span>
    </label>
    <input type="checkbox" id="user-logout-click" checked="false">
    <div class="user-info-mini">
      <div class="user-info-mini-container">

        <?php
        include '../db_config/connection.php';

        $sql = "SELECT * FROM tinhtv_admin WHERE username='$myusername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc())
          {
            $avatar = $row['img_dd'];
            $gender = $row['gender'];
            $Name=$row['fullname'];
            $Depart=$row['department'];
            $DoB=$row['DoB'];
            echo '<img src="../dist/img/'.$avatar.'" class="user-image image-user-info" alt="'.$current_user.'" title="'.$current_user.'"/>';
          }
        }
        $conn->close();
        ?>
        <p class="user-info-mini-text">
          <?php
          echo "<span>$Name</span><br>";
          ?>
          <?php
          echo "<span id=small-info>$Depart</span><br>";
          echo "<span id=small-info>$DoB</span>";
          ?>
        </p>
      </div>
      <ul>
        <li>
          <a href="profile.php">Profile</a>
        </li>
        <li>
          <a href="logout.php">Logout</a>
        </li>
      </ul>

    </div>

  </div>
</header>