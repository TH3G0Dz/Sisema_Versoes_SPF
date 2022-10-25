<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="dist/style.css" />
    <script src="dist/script.js" defer></script>
    <title></title>
    <script>
    </script>
</head>

<body>
    <div class="titulo">
        <h1 id="tit"">Versionamento SPF</h1>
        <p>Versões:</p>
    </Div>

    <table>
        <tr>
            <td>Ralf</td>
            <td>26</td>
            <td>Designer</td>
        </tr>
    </table>

    <div id="tree_view"></div>
    <script>
        let tableVersion = <?php include("responseVersion.php") ?>;
        let tableItem = <?php include("responseItem.php") ?>;

        let treeView = document.getElementById('tree_view');
        let ulBase = document.createElement('ul');
        ulBase.className = 'ulBase';

        function GenerateTreeView(tableVersion, tableItem) {
            tableVersion.forEach(version => {
                let liVersion = document.createElement('li');
                let tableVersion = document.createElement('table');
                liVersion.innerHTML = version.VERSAO;

                tableItem.forEach(change => {
                    if (version.ID == change.ID_CONTROLE_VERSAO) {
                        let trChanges = document.createElement('tr');
                        let tdSequencial = document.createElement('td');
                        tdSequencial.innerHTML = change.SEQUENCIAL + '&nbsp; -';
                        trChanges.append(tdSequencial);

                        trChanges.className = 'nested';
                        liVersion.className = 'liVersion';

                        let tdChange = document.createElement('td');
                        tdChange.setAttribute('id','liChange');
                        tdChange.innerHTML = change.DESCRICAO;
                        trChanges.append(tdChange);

                        tableVersion.append(trChanges);
                    }
                    liVersion.append(tableVersion);
                })
                ulBase.append(liVersion);
                treeView.append(ulBase);
            });
        }

        GenerateTreeView(tableVersion, tableItem);
    </script>
</body>

</html>