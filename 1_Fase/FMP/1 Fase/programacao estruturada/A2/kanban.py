import tkinter as tk #<----- Importando biblioteca 
from tkinter import messagebox  #<-----  Importando o box de mensagem do tkinter

def adicionarTarefa():    #<----- Criando função para adicionar a tarefa

  novaTarefa = entrada.get()  #<----- pega o texto digitado pelo usuario ( Input )

  if novaTarefa:     #<----- erificar se o campo nao está em branco

    listaAFazer.insert(tk.END, novaTarefa)  #<-----  Adiciona a tarefa no final da lista "a Fazer"

    entrada.delete(0, tk.END)   #<----- Limpa o campo para adicionar outra tarefa

  else:

    messagebox.showwarning("Aviso", "Digite uma tarefa válida!")  #<-----  se estiver em branco retorna <--

def moverParaEmAndamento(): #<----- criando função para mover de a fazer para em andamento

  try:     #<-----   = tente

    selecionada = listaAFazer.curselection()[0]    #<----- pega o indice da tarefa selecionada na lista a fazer

    tarefa = listaAFazer.get(selecionada)   #<----- pega o texto da tarefa selecionada

    listaAFazer.delete(selecionada)   #<-----  e remove da lista de a fazer

    listaEmAndamento.insert(tk.END, tarefa)  #<-----  adiciona o texto selecionado a lista em andamento

  except IndexError:   #<-----  se nao selecionar nenhuma tarefa, exibe um aviso --->

    messagebox.showwarning("Aviso", "Selecione uma tarefa para mover para 'Em andamento'!")  #<----- aviso <----

def moverParaConcluido():   #<----- Funcao para mover de em andamento para concluido

  try: #<----- tente : 

    selecionada = listaEmAndamento.curselection()[0] #<-----  Pega o indice da tarefa selecionada da lista em andamento

    tarefa = listaEmAndamento.get(selecionada) #<----- pega o texto da tarefa selecionada

    listaEmAndamento.delete(selecionada) #<----- e remove da lista de em andamento
   

    listaConcluido.insert(tk.END, tarefa)#<----- adiciona o texto selecionado a lista concluidos


  except IndexError:#<-----  se nao selecionar nenhuma tarefa, exibe um aviso --->

    messagebox.showwarning("Aviso", "Selecione uma tarefa para mover para 'Concluído'!")    #aviso <----

def removerTarefa(): #<----- funcao para remover a tarefa 

  try:#<----- tente : 

    #---- ↓ --------------------  ↓   ----------------------------------------------------------
    selecionada = listaConcluido.curselection()[0]#<-----  Pega o indice da tarefa selecionada da lista em andamento

    listaConcluido.delete(selecionada)#<-----  e remove da lista de concluidos

  except IndexError:#<-----  se nao selecionar nenhuma tarefa, exibe um aviso --->

    messagebox.showwarning("Aviso", "Selecione uma tarefa para remover!")   ##<----- aviso 


#---- ↓ ------ Definição de cores e fontes ------------  ↓   --------------------------------------------------------------
janela = tk.Tk()  # <--- Cria a Janela principal 
janela.title("Kanban de Tarefas")    #<----- Titulo 
corFundo = "#F0F0F0"
fonte = ("Helvetica", 12)
corAFazer = "#FFA07A" 
corEmAndamento = "#ADD8E6" 
corConcluido = "#98FB98" 

quadroSuperior = tk.Frame(janela, bg=corFundo)#<-----  Cria um quadro na parte superior da janela
quadroSuperior.pack(pady=20) #<-----  pady = espaçamento vertical acima e abx do  widget
entrada = tk.Entry(quadroSuperior, width=40, font=fonte) #<----- Cria um campo para digitar a entrada de tarefas  <----- Width = limitar caracteres
entrada.pack()#<-----  adiciona a entrada do usuario
btnAdicionar = tk.Button(quadroSuperior, text="Adicionar Tarefa", command=adicionarTarefa, font=fonte)#<----- Cria um botao para adicionar tarefas vinculado a função 
btnAdicionar.pack()#<-----  adiciona o texto dentro da janela
# ---------------------
quadroPrincipal = tk.Frame(janela, bg=corFundo)#<----- Cria o quadro principal onde as listas seram exibidas  #<----- bg = cor de fundo /
quadroPrincipal.pack()#<----- adiciona o quadro a janela
quadroAFazer = tk.Frame(quadroPrincipal, bg=corAFazer, borderwidth=2, relief=tk.SOLID)          #<----- Cria o quadro a fazer
quadroAFazer.pack(side=tk.LEFT, padx=20)   #<-----borderwidth=2,Adiciona bordas sólidas aos quadros.       #<-----  adiciona o quadro a janela
quadroEmAndamento = tk.Frame(quadroPrincipal, bg=corEmAndamento, borderwidth=2, relief=tk.SOLID)#<----- Cria o quadro em andamento
quadroEmAndamento.pack(side=tk.LEFT, padx=20) #<-"""relief=tk.SOLID""": Adiciona bordas sólidas aos quadros. #<----- adiciona o quadro a janela
quadroConcluido = tk.Frame(quadroPrincipal, bg=corConcluido, borderwidth=2, relief=tk.SOLID)    #<----- Cria o quadro concluido
quadroConcluido.pack(side=tk.LEFT, padx=20)#<-pack(side=tk.LEFT, padx=20): Posiciona os quadros lado a lado com espaçamento horizontal.  #<----- adiciona o quadro a janela
labelAFazer = tk.Label(quadroAFazer, text="A fazer", font=fonte, bg=corAFazer)#<-----  Adiciona rótulos para identificar cada lista.
labelAFazer.pack()#<----- adiciona o quadro a janela
labelEmAndamento = tk.Label(quadroEmAndamento, text="Em andamento", font=fonte, bg=corEmAndamento)#<-----Adiciona rótulos para identificar cada lista.
labelEmAndamento.pack()#<----- adiciona o quadro a janela
labelConcluido = tk.Label(quadroConcluido, text="Concluído", font=fonte, bg=corConcluido)#<-----  Adiciona rótulos para identificar cada lista.
labelConcluido.pack()#<----- adiciona o quadro a janela
listaAFazer = tk.Listbox(quadroAFazer, selectbackground='#FFD700', selectmode=tk.SINGLE, width=20, height=10, font=fonte)
# ↑ Cria lista para exibir as tarefas.--------------- selectmode=tk.SINGLE: Permite selecionar apenas uma tarefa por vez.
listaAFazer.pack()
# ↑ adiciona o quadro a janela.--------------- ------------------------------------------------------------------------------
listaEmAndamento = tk.Listbox(quadroEmAndamento, selectbackground='#FFD700', selectmode=tk.SINGLE, width=20, height=10, font=fonte)
# ↑ Cria lista para exibir as tarefas.--------------- selectmode=tk.SINGLE: Permite selecionar apenas uma tarefa por vez.
listaEmAndamento.pack()
# ↑ adiciona o quadro a janela--------------- ------------------------------------------------------------------------------
listaConcluido = tk.Listbox(quadroConcluido, selectbackground='#FFD700', selectmode=tk.SINGLE, width=20, height=10, font=fonte)
# ↑ Cria lista para exibir as tarefas.--------------- ------------------------------------------------------------------------------
listaConcluido.pack()
# ↑ adiciona o quadro a janela.---------------  selectmode=tk.SINGLE: Permite selecionar apenas uma tarefa por vez.

btnMoverEmAndamento = tk.Button(quadroAFazer, text="Mover para 'Em andamento'", command=moverParaEmAndamento, font=fonte)
# ↑ Adiciona botões para mover tarefas entre listas ou removê-las.---------------
btnMoverEmAndamento.pack()
# ↑ adiciona o quadro a janela.
btnMoverConcluido = tk.Button(quadroEmAndamento, text="Mover para 'Concluído'", command=moverParaConcluido, font=fonte)
# ↑ Adiciona botões para mover tarefas entre listas ou removê-las.---------------
btnMoverConcluido.pack()
# ↑ adiciona o quadro a janela.
btnRemover = tk.Button(quadroConcluido, text="Remover Tarefa", command=removerTarefa, font=fonte)
# ↑ Adiciona botões para mover tarefas entre listas ou removê-las.---------------
btnRemover.pack()
# ↑ adiciona o quadro a janela.  ------------------------------------------------------------------------------

janela.mainloop()
# ↑ Inicia o loop principal da aplicação, mantendo a janela aberta e aguardando interações do usuário.
