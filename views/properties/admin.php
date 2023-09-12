<main class="container section">
        <h1>Real State Administrator</h1>
        
        <?php
            if($result){
                $message = showNotification(intval($result));
                if($message) { ?>
                    <p class='alert success'> <?php echo s($message) ?> </p>;
                <?php }
            }
        ?>
        <a href="/admin/properties/create.php" class="button green-button">New Property</a>
        <a href="/admin/sellers/create.php" class="button yellow-button">New Seller</a>

        <h2>Properties</h2>

        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $properties as $property): ?>
                <tr>
                    <td> <?php echo $property->id; ?> </td>
                    <td> <?php echo $property->title; ?> </td>
                    <td><img src="/images/<?php echo $property->image; ?> " alt="Table Image" class="table-image"></td>
                    <td>$ <?php echo $property->price; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property->id ?>">
                            <input type="hidden" name="type" value="property">
                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a href="/admin/properties/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>