Kwf.Welcome = Ext.extend(Ext.Panel,
{
    afterRender: function() {
        this.welcomePanel = new Ext.Panel({
            cls: 'kwf-welcome',
            width: 304,
            autoLoad: '/kwf/welcome/content',
            border: false,
            renderTo: this.getEl()
        });
        this.welcomePanel.getUpdater().on('update', function() {
            this.welcomePanel.getEl().center();
        }, this);
        Kwf.Welcome.superclass.afterRender.call(this);
    },
    onResize: function(w, h) {
        Kwf.Welcome.superclass.onResize.call(this, w, h);
        this.welcomePanel.getEl().center();
    }
});
var Welcome = Kwf.Welcome;

