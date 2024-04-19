-- Atividade 1

SELECT cli.NOME AS NomeCliente, ven.DUPLIC AS NumeroDuplicata, ven.VALOR AS Valor
FROM cliente cli
INNER JOIN venda ven ON cli.CODCLI = ven.CODCLI
WHERE cli.NOME = 'PCTEC - MICROCOMPUTADORES S/A';

-- Atividade 2

SELECT cli.NOME AS NomeCliente, ven.DUPLIC AS NumeroDuplicata, ven.VEN AS DataVencimento
FROM cliente cli
INNER JOIN venda ven ON cli.CODCLI = ven.CODCLI
WHERE ven.VEN >= '2004-11-01' AND ven.VEN <= '2004-11-30'
ORDER BY ven.VEN;

-- Atividade 3 

SELECT cli.NOME AS NomeCliente, ven.DUPLIC AS NumeroDuplicata, ven.VEN AS DataVencimento
FROM cliente cli
INNER JOIN venda ven ON cli.CODCLI = ven.CODCLI
WHERE EXTRACT(MONTH FROM ven.VEN) = 10
ORDER BY ven.VEN;

-- Atividade 4 

SELECT cli.NOME AS NomeCliente, COUNT(ven.DUPLIC) AS QuantidadeTitulos, SUM(ven.VALOR) AS TotalDevido
FROM cliente cli
LEFT JOIN venda ven ON cli.CODCLI = ven.CODCLI
GROUP BY cli.NOME;

-- Atividade 5

SELECT cli.NOME AS NomeCliente, COUNT(ven.DUPLIC) AS QuantidadeTitulos, SUM(ven.VALOR) AS TotalDevido
FROM cliente cli
LEFT JOIN venda ven ON cli.CODCLI = ven.CODCLI
GROUP BY cli.NOME;

-- Atividade 6

SELECT cli.NOME AS CLIENTE, 
       COUNT(ven.DUPLIC) AS VENCIDOS
FROM cliente cli
INNER JOIN venda ven ON cli.CODCLI = ven.CODCLI
WHERE ven.VEN < '2003-12-31'
GROUP BY cli.NOME;

-- Atividade 7 

SELECT cli.NOME AS Cliente, ven.DUPLIC AS NumeroDuplicata, ven.VALOR AS ValorDuplicata, (ven.VALOR * 0.10) AS Juros, (ven.VALOR * 1.10) AS TotalCobrado
FROM cliente cli
INNER JOIN venda ven ON cli.CODCLI = ven.CODCLI
WHERE ven.VEN < '2000-01-01'
ORDER BY cli.NOME;



