package crouskiebackoffice.model;

import java.sql.SQLException;
import java.util.HashMap;

public class DAOTag extends DAO<Tag> {

    @Override
    public Boolean insertOrUpdate(Tag obj) throws SQLException {
        if (exist(obj)) {
            Object[] args = {obj.getName(), obj.getId()};
            return super.execute("UPDATE TABLE " + getTableName() + " SET  nametag = ? WHERE idtag = ?", args) == 0;
        } else {
            Object[] args = {obj.getName()};
            return super.execute("INSERT INTO " + getTableName() + " (nametag) values (?)", args) == 0;
        }
    }

    @Override
    public Boolean exist(Tag obj) throws SQLException {
        return obj.getId() != -1;
    }

    @Override
    protected Tag parseData(HashMap<String, Object> obj) {
        return new Tag((int) obj.get("idtag"), obj.get("nametag").toString());
    }

    @Override
    protected String getTableName() {
        return "TAG";
    }

    @Override
    public Boolean remove(Tag obj) throws SQLException {
        Object[] args = {obj.getId()};
        return super.execute("DELETE FROM " + getTableName() + " WHERE idtag = ? ", args) == 0;
    }
}