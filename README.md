# FaturaPlus

Este é o Repositório do Website do Projeto FaturaPlus.

## Git (WINDOWS)

### Git Init

```bash
git init
```

### Git Clone

```bash
git clone https://github.com/GuilhermeCruzPT/FaturaPlus.git
```

### Criar Branch

```bash
git checkout -b feature_branch
```

### Change Branch

```bash
git checkout branch_name
```

### Git Add

```bash
git add .
```

### Git Commit

```bash
git commit -m "Mensagem"
```

### Git Push

```bash
git push -u origin branch_name
```

### Concluir uma Branch

```bash
git checkout feature_branch (Branch para onde queremos enviar o conteúdo.)
git merge feature_branch
```

### Criar Versão

```bash
git checkout develop
git checkout -b release/0.1.0
```

### Concluir Versão

```bash
git checkout main
git merge release/0.1.0
```

### Criar Branch Hotfix

```bash
git checkout main
git checkout -b hotfix_branch
```

### Concluir Branch Hotfix

```bash
git checkout main
git merge hotfix_branch
git checkout develop
git merge hotfix_branch
git branch -D hotfix_branch
```
