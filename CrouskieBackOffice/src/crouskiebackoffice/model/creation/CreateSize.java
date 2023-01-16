package crouskiebackoffice.model.creation;

import crouskiebackoffice.model.ClothSize;

/**
 * Crée une Size avec sont nom
 */
public class CreateSize implements ICreateClass<ClothSize> {

    @Override
    public ClothSize createWithName(String name) {
        return new ClothSize(name);
    }

    @Override
    public ClothSize createWithNameAndInfo(String name, String info) {
        return null;
    }
}