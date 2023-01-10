package crouskiebackoffice.model.listmodel;

import crouskiebackoffice.controle.AddingColorController;
import crouskiebackoffice.model.Color;
import crouskiebackoffice.model.Product;
import crouskiebackoffice.model.creation.CreateColor;
import crouskiebackoffice.model.dao.DAOColor;

/**
 * Liste dynamic pour les données de type {@link Color}
 */
public class DynamicListColorModel extends DynamicListModel<Color> {

    public DynamicListColorModel(Product product) {
        super(product.getExistingColor());

        dao = new DAOColor();
    }

    @Override
    public void addItem() {
        add(getSize(), (new AddingColorController(dao, new CreateColor())).newValue());
    }

    @Override
    public String toString() {
        return "DynamicListColorModel";
    }
}
