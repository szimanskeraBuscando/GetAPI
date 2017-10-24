<?php 

class Catalog {
    public function insertCatalog($icon, $title, $subtitle, $descriptionProduct, $resources, $type, $category){
        global $pdo;

        $query = $pdo->prepare("INSERT INTO catalog (icon, title, subtitle, descriptionProduct, resources, typeCatalog, category_idCategory) VALUES (?,?,?,?,?,?,?)");
        $query->bindValue(1, $icon);
        $query->bindValue(2, $title);
        $query->bindValue(3, $subtitle);
        $query->bindValue(4, $descriptionProduct);
        $query->bindValue(5, $resources);
        $query->bindValue(6, $type);
        $query->bindValue(7, $category);
        $query->execute();
    }
}