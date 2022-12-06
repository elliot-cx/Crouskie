package crouskiebackoffice.view;

import crouskiebackoffice.controle.ControllerImageCollection;
import crouskiebackoffice.model.Collection;

/**
 *
 * @author wwwazz
 */
public class CollectionSelectionView extends javax.swing.JDialog {

    private ControllerImageCollection controller;
    private Collection collection;

    public CollectionSelectionView(java.awt.Frame parent, boolean modal, Collection collection) {
        super(parent, modal);
        initComponents();

        controller = new ControllerImageCollection(this, addCollection, collection);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        addCollection = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("Collection");
        setLocationByPlatform(true);
        setMinimumSize(new java.awt.Dimension(720, 480));
        setPreferredSize(new java.awt.Dimension(720, 480));
        setSize(new java.awt.Dimension(720, 480));
        getContentPane().setLayout(new java.awt.FlowLayout());

        addCollection.setText("ajouté collection");
        getContentPane().add(addCollection);

        pack();
    }// </editor-fold>//GEN-END:initComponents


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton addCollection;
    // End of variables declaration//GEN-END:variables
}
