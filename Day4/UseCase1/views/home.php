<?php if($success): ?>
  <h1>Bestellung erfolgreich!</h1>

  <p>Vielen Dank für Ihre Bestellung. Wir haben diese erfolgreich entgegengenommen.</p>
<?php else: ?>
<?php
  if(empty($errors) === false){
    echo '<ul class="error-wrapper">';
    foreach ($errors as $error) {
      echo '<li class="error-list-item">' . $error . '</li>';
    }
    echo '</ul>';
  }
?>

<ul id="error-list"></ul>

<h1>Ihre Bestellung</h1>

<form action="index.php" id="orderForm" method="post">

    <ul class="product-list">

        <script>var products = <?php echo json_encode($products); ?></script>

            <?php
              foreach ($products as $productID => $product) {
                $productName = $product["name"];
                $productPrice = $product["price"];

                echo '<li class="product-list__entry">';

                    echo '<div class="product-information">';
                        echo '<h3 class="product-name">' . $productName . '</h3>';
                        echo '<p class="product-price">' . $productPrice . ' SFr.</p>';
                    echo '</div>';

                    echo '<fieldset class="product-attributes">';

                        echo '<div class="input-group">';
                            echo '<label for="size-' . $productID . '">Grösse</label>';

                            echo '<select name="Order[' . $productID . '][size]" id="size-' . $productID . '">';
                                $selected = $_POST["Order"][$productID]["size"]?? 'S';

                                echo '<option value="S"';
                                if($selected == "S"){
                                  echo "selected";
                                }
                                echo '>';
                                    echo 'Small';
                                echo '</option>';

                                echo '<option value="M"';
                                if($selected == "M"){
                                  echo "selected";
                                }
                                echo '>';
                                    echo 'Medium';
                                echo '</option>';

                                echo '<option value="L"';
                                if($selected == "L"){
                                  echo "selected";
                                }
                                echo '>';
                                    echo 'Large';
                                echo '</option>';
                            echo '</select>';
                        echo '</div>';

                        echo '<div class="input-group">';
                            echo '<label for="quantity-' . $productID . '">Anzahl</label>';
                            echo '<input type="number"';
                                   echo 'value="' . htmlspecialchars($_POST["Order"][$productID]["quantity"]?? '0') . '"';
                                   echo 'min="0"';
                                   echo 'max="10"';
                                   echo 'class="js-quantity"';
                                   echo 'name="Order[' . $productID . '][quantity]"';
                                   echo 'id="quantity-' . $productID . '">';
                        echo '</div>';
                    echo '</fieldset>';
                echo '</li>';
              }
            ?>
    </ul>

    <h2>Kundendaten</h2>

    <div class="additional-info">

        <fieldset class="additional-info__column">

            <div class="input-group">
                <label for="email">Ihre Email</label>
                <input type="email" id="email" name="Customer[email]" value=<?=htmlspecialchars($_POST["Customer"]["email"]?? ' ')?>>
            </div>

            <div class="input-group">
                <label for="password">Ihr Passwort</label>
                <input type="password" id="password" name="Customer[password]" value=<?=htmlspecialchars($_POST["Customer"]["password"]?? ' ')?>>
            </div>

            <div class="form-actions">
                <button class="btn" type="submit">Bestellung abschliessen &rarr;</button>
            </div>

        </fieldset>

        <div class="additional-info__column">

            <table class="table-totals">
                <tr>
                    <th>Total (exkl. MwSt.)</th>
                    <td id="total"></td>
                </tr>
                <tr>
                    <th>MwSt.</th>
                    <td id="vat"></td>
                </tr>
                <tr>
                    <th>Total (inkl. MwSt.)</th>
                    <td id="total-vat"></td>
                </tr>
            </table>

        </div>
    </form>
    <?php endif; ?>
