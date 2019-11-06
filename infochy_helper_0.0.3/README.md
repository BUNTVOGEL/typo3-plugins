<h3>SETUP: <a href="https://github.com/wallpageNET/infochy_helper/tree/master/ExampleFiles" target="_blank">ExampleFiles</a></h3>

<strong>Helper-Extension-GIT:</strong> <a href="https://github.com/wallpageNET/infochy_helper" target="_blank">infochy_helper</a><br>
<strong>Helper-Extension-TER:</strong> <a href="https://typo3.org/extensions/repository/view/infochy_helper" target="_blank">infochy_helper</a><br>
<strong>
Example-Extension-TER:</strong> <a href="https://github.com/wallpageNET/infochy_feeditexample" target="_blank">infochy_feeditexample</a><br>
<strong>Example-Extension-GIT:</strong> <a href="https://typo3.org/extensions/repository/view/infochy_feeditexample" target="_blank">infochy_feeditexample</a><br>

<h2>Installation</h2>

1. Installiere infochy_helper

2. Installiere infochy_feeditexample

3. Plugin (Private Plugin - Extbase Example/ Public Plugin - Extbase Example) anlegen und Record Storage Page defenieren im Plugin

4. Installiere fe_login und FeUser im Backend anlegen

<h2>Informationen für eigene Extension</h2>

1. Mit dem ExtensionBuilder ein Frontend plugin erzeugen. Model im  "aggregate root" anlegen, damit ein Controller angelegt wird. Im Model die Propertys User(int) und Image(image*) festlegen.

2. In der eigenen Extension den BaseHelperController erben und Einstellungen (<a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Controller/BaseMyDataController.php" target="_blank">$modelObjNameCreateAction,$modelObjNameUpdateAction,$fileadminFolder,$actionNameOnAccessFailed,$imagePropertyNameInModel</a>) definieren.

3. Model für hiddenRecords freischalten: $hiddenRecordsObjectConverter + <a target="_blank" href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Property/TypeConverter/MyDataHiddenRecordsObjectConverter.php">TypeConvert anlegen</a> + <a target="_blank" href="https://github.com/wallpageNET/infochy_helper/blob/master/ExampleFiles/ext_localconf.php">Instanzieren in ext_localconf.php</a>

4. PropertyMapper Action festlegen: <a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Controller/BaseMyDataController.php" target="_blank">$actionGetRecord, $actionModificationRecord, $actionCreateRecord</a>

5. Domain erweiteren (<a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Domain/Model/MyData.php" target="_blank">BaseHelperModel</a>,
 <a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Domain/Repository/MyDataRepository.php" target="_blank">BaseHelperRepository</a>)

6. <a href="https://github.com/wallpageNET/infochy_helper/blob/master/ExampleFiles/tcaExample.php" target="_blank">TCA definieren</a>

7. <a href="https://github.com/wallpageNET/infochy_helper/blob/master/ExampleFiles/FluidActionTemplate.html" target="_blank">Edit und New Fluid-Action-Template bearbeiten</a>

8. <a href="https://github.com/wallpageNET/infochy_helper/blob/master/ExampleFiles/FormFields.html" target="_blank">Partial Template bearbeiten</a>

8. <a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Resources/Private/Partials/FormErrors.html" target="_blank">FormErrors.html</a> ersetzen.

9. <a href="https://github.com/wallpageNET/infochy_feeditexample/blob/master/Classes/Controller/MyDataController.php" target="_blank">Aktion anlegen + ext_localconf.php + Fluid</a>



