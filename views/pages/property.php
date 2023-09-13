<main class="container section centered-content">
    <h1><?php echo $property->title?></h1>

    <img loading="lazy" src="/images/<?php echo $property->image?>" alt="Property Image">

    <div class="property-info">
        <p class="price">$<?php echo $property->price?></p>
        <ul class="icons-stats">
            <li>
                <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                <p><?php echo $property->wc?></p>
            </li>
            <li>
                <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                <p><?php echo $property->parking?></p>
            </li>
            <li>
                <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                <p><?php echo $property->rooms?></p>
            </li>
        </ul>
        <p>
            <?php echo $property->description?>
        </p>
    </div>
</main>