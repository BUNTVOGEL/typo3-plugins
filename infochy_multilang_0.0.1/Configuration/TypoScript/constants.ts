
plugin.tx_infochymultilang_model {
  view {
    # cat=plugin.tx_infochymultilang_model/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:infochy_multilang/Resources/Private/Templates/
    # cat=plugin.tx_infochymultilang_model/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:infochy_multilang/Resources/Private/Partials/
    # cat=plugin.tx_infochymultilang_model/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:infochy_multilang/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_infochymultilang_model//a; type=string; label=Default storage PID
    storagePid =
  }
}
