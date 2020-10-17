<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand mr-auto mr-lg-0" href="index.php">Linux Tuning Project</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="">By Nofar Alfasi</a>
            </li>
        </ul>
    </div>
</nav>

<div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline">
        <a class="nav-link active" href="index.php">Dashboard</a>
        <?php
        if ($config["display"]["os"] != false){
            echo '<a class="nav-link" href="os.php">System</a>';
        }
        if ($config["display"]["memory"] != false){
            echo '<a class="nav-link" href="ram.php">Memory</a>';
        }
        if ($config["display"]["hdd1"] != false){
            echo '<a class="nav-link" href="hdd1.php">HDD1</a>';
        }
        if ($config["display"]["hdd2"] != false){
            echo '<a class="nav-link" href="hdd2.php">HDD2</a>';
        }
        if ($config["display"]["hdd3"] != false){
            echo '<a class="nav-link" href="hdd3.php">HDD3</a>';
        }
        if ($config["display"]["cpu"] != false){
            echo '<a class="nav-link" href="cpu.php">CPU</a>';
        }
        if ($config["display"]["network"] != false){
            echo '<a class="nav-link" href="network.php">Network</a>';
        }

        ?>
    </nav>
</div>
