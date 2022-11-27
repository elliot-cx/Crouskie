package crouskiebackoffice.model;

import crouskiebackoffice.model.dao.DAOProduct;
import java.sql.SQLException;

public class ProductManager {

    private static ProductManager instance;

    private DAOProduct daoProduct;

    private ProductManager() {
        daoProduct = new DAOProduct();
    }

    public static ProductManager getInstance() {
        if (instance == null) {
            instance = new ProductManager();
        }
        return instance;
    }

    public boolean save(Product product) throws SQLException {
        return daoProduct.insertOrUpdate(product);
    }

}