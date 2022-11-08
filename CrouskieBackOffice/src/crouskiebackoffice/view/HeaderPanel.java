/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JPanel.java to edit this template
 */
package crouskiebackoffice.view;

import crouskiebackoffice.controle.Navigator;

/**
 *
 * @author wwwazz
 */
public class HeaderPanel extends javax.swing.JPanel {

    /**
     * Creates new form HeaderPanel
     */
    public HeaderPanel() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form. WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {
        java.awt.GridBagConstraints gridBagConstraints;

        banner = new javax.swing.JLabel();
        jPanel1 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        filler1 = new javax.swing.Box.Filler(new java.awt.Dimension(5, 0), new java.awt.Dimension(5, 0), new java.awt.Dimension(5, 0));
        backBtn = new javax.swing.JButton();

        setBackground(new java.awt.Color(254, 0, 0));
        setForeground(new java.awt.Color(255, 255, 255));
        setMaximumSize(new java.awt.Dimension(32767, 46));
        setMinimumSize(new java.awt.Dimension(300, 46));
        setPreferredSize(new java.awt.Dimension(733, 46));
        setLayout(new javax.swing.OverlayLayout(this));

        banner.setIcon(new javax.swing.ImageIcon(getClass().getResource("/assets/banier_small.jpeg"))); // NOI18N
        banner.setAlignmentX(0.5F);
        add(banner);

        jPanel1.setBackground(new java.awt.Color(254, 0, 0));
        jPanel1.setLayout(new java.awt.BorderLayout());

        jPanel2.setBackground(new java.awt.Color(254, 0, 0));
        jPanel2.setLayout(new javax.swing.BoxLayout(jPanel2, javax.swing.BoxLayout.LINE_AXIS));
        jPanel2.add(filler1);

        backBtn.setIcon(new javax.swing.ImageIcon(getClass().getResource("/assets/back_small.png"))); // NOI18N
        backBtn.setToolTipText("go Back");
        backBtn.setBorder(null);
        backBtn.setBorderPainted(false);
        backBtn.setContentAreaFilled(false);
        backBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        backBtn.setHorizontalAlignment(javax.swing.SwingConstants.LEFT);
        backBtn.setHorizontalTextPosition(javax.swing.SwingConstants.LEFT);
        backBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                backBtnActionPerformed(evt);
            }
        });
        jPanel2.add(backBtn);

        jPanel1.add(jPanel2, java.awt.BorderLayout.WEST);

        add(jPanel1);
    }// </editor-fold>//GEN-END:initComponents

    private void backBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_backBtnActionPerformed
        System.out.println("back");
        Navigator.getInstance().goBack();
    }//GEN-LAST:event_backBtnActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton backBtn;
    private javax.swing.JLabel banner;
    private javax.swing.Box.Filler filler1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    // End of variables declaration//GEN-END:variables
}
